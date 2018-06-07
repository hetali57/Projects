package com.example.abhi.bank;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

/**
 * Created by Abhi on 2018-01-12.
 */

public class DataBase extends SQLiteOpenHelper {

    public static final String DATABASE_NAME = "register.db";
    public static final String TABLE_NAME = "register";
    public static final String TABLE_NAME_1 = "account";
    public static final String COL_1 = "ID";
    public static final String COL_2 = "FirstName";
    public static final String COL_3 = "LastName";
    public static final String COL_4 = "CardNumber";
    public static final String COL_5 = "Password";
    public static final String COL_6 = "ConfirmPassword";
    public static final String COL_7 = "accountid";
    public static final String COL_8 = "basicamount";
    public static final String COL_9="savingamount";

    public DataBase(Context context) {
        super(context, DATABASE_NAME, null, 2);
    }

    public static final String TABLE_1 = "CREATE TABLE " + TABLE_NAME + "(ID INTEGER PRIMARY KEY AUTOINCREMENT,FirstName TEXT,LastName TEXT,CardNumber TEXT,Password TEXT,ConfirmPassword TEXT)";

    public static final String TABLE_2 = "CREATE TABLE " + TABLE_NAME_1 + "(AccountID INTEGER PRIMARY KEY AUTOINCREMENT REFERENCES register(ID),BasicAmount INTEGER,SavingAmount INTEGER)";

    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL(TABLE_1);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int i, int i1) {
        db.execSQL(TABLE_2);
    }

    public boolean insertData(String amt1) {
        SQLiteDatabase db = this.getWritableDatabase();
        ContentValues contentValues = new ContentValues(); // by this class we can write values in data base
        contentValues.put(DataBase.COL_8, amt1);
        //contentValues.put(DataBase.COL_9,amt2);
        long result = db.insert(DataBase.TABLE_NAME_1, null, contentValues);

        if(result == -1)
            return false;
        else
            return true;
    }

    public boolean insertSavingData(String amt2) {
        SQLiteDatabase db = this.getWritableDatabase();
        ContentValues contentValues = new ContentValues(); // by this class we can write values in data base
        contentValues.put(DataBase.COL_9,amt2);
        long result = db.insert(DataBase.TABLE_NAME_1, null, contentValues);

        if(result == -1)
            return false;
        else
            return true;
    }

    public Cursor getSum(){
        SQLiteDatabase db = this.getWritableDatabase();
        Cursor cursor = db.rawQuery("SELECT SUM(" + COL_8  + ") as BALANCE FROM " + DataBase.TABLE_NAME_1 , null);
        return cursor;
    }

    public Cursor getSavingSum(){
        SQLiteDatabase db2 = this.getWritableDatabase();
        Cursor cursor2 = db2.rawQuery("SELECT SUM(" + COL_9 + ") as SAVINGS FROM " + DataBase.TABLE_NAME_1, null);
        return cursor2;
    }

    //deposit to account
    public Cursor getBasicDepositAmount(int amount){
        SQLiteDatabase data = this.getWritableDatabase();
        Cursor cursor3 = data.rawQuery("UPDATE " + TABLE_NAME_1 + " SET " + COL_8 + " = (SELECT "+ COL_8 +" FROM "+ TABLE_NAME_1 +" WHERE "+ COL_7 +" = 1) + " + amount + " WHERE " + COL_7 + " = 1", null);
        return cursor3;
    }

    public Cursor getSavingDepositAmount(int amount){
        SQLiteDatabase data = this.getWritableDatabase();
        Cursor cursor3 = data.rawQuery("UPDATE " + TABLE_NAME_1 + " SET " + COL_9 + " = (SELECT "+ COL_9 +" FROM "+ TABLE_NAME_1 +" WHERE "+ COL_7 +" = 1) + " + amount + " WHERE " + COL_7 + " = 1", null);
        return cursor3;
    }

    //withdraw to amount
    public Cursor getBasicWithdrawAmount(int amount){
        SQLiteDatabase data = this.getWritableDatabase();
        Cursor cursor4 = data.rawQuery("UPDATE " + TABLE_NAME_1 + " SET " + COL_8 + " = (SELECT "+ COL_8 +" FROM "+ TABLE_NAME_1 +" WHERE "+ COL_7 +" = 1) - " + amount + " WHERE " + COL_7 + " = 1", null);
        return cursor4;
    }

    public Cursor getSavingWithdrawAmount(int amount){
        SQLiteDatabase data = this.getWritableDatabase();
        Cursor cursor4 = data.rawQuery("UPDATE " + TABLE_NAME_1 + " SET " + COL_9 + " = (SELECT "+ COL_9 +" FROM "+ TABLE_NAME_1 +" WHERE "+ COL_7 +" = 1) - " + amount + " WHERE " + COL_7 + " = 1", null);
        return cursor4;
    }

/*    public Cursor getBasicToSaving(int amount){
        SQLiteDatabase data = this.getWritableDatabase();
        return;
    }*/

    public Cursor getSavingToBasic(int amount){
        SQLiteDatabase data = this.getWritableDatabase();
        Cursor cursor5 = data.rawQuery("UPDATE " + TABLE_NAME_1 + " SET " + COL_9 + " + (SELECT "+ COL_9 +" FROM "+ TABLE_NAME_1 +" WHERE "+ COL_7 +" = 1) - " + amount + " WHERE " + COL_7 + " = 1;" +
                "UPDATE " + TABLE_NAME_1 + " SET " + COL_8 + " = (SELECT "+ COL_8 +" FROM "+ TABLE_NAME_1 +" WHERE "+ COL_7 +" = 1) + " + amount + " WHERE " + COL_7 + " = 1", null);
        return cursor5;
    }
    /*public int getTransfer(int sum){
        SQLiteDatabase db = this.getReadableDatabase();
        Cursor c = db.rawQuery("SELECT SUM(" + COL_8 + "), SUM(" + COL_9 +") FROM " + TABLE_NAME_1, null);
        if(c.moveToFirst()) {
             sum = (c.getInt(1) - c.getInt(2));
        }
        return sum;
    }*/

    /*public Cursor withdrawFromSaving(){
        SQLiteDatabase db3 = this.getWritableDatabase();
        Cursor cursor2 = db3.rawQuery("UPDATE " + TABLE_NAME_1 + " SET " + COL_8 + " = " + amount + " WHERE " + COL_7 + " = 52", null);
        return cursor2;
    }*/

/*    public Cursor getData(){
        String amt = "";
        SQLiteDatabase db = this.getWritableDatabase();
        Cursor cursor = db.rawQuery("SELECT * FROM " + DataBase.TABLE_NAME_1 , null);
        return cursor;
    }*/
}

