package com.example.abhi.bank;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

public class AccountDataBase extends SQLiteOpenHelper {

    public static final String DATABASE_NAME="register.db";
    public static final String TABLE_NAME_1="account";
    public static final String COL_1="ID";
    public static final String COL_7="AccountID";
    public static final String COL_8="BasicAmount";
    // public static final String COL_9="SavingAmount";

    public AccountDataBase(Context context) {
        super(context, DATABASE_NAME, null, 1);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {

        db.execSQL("CREATE TABLE " + TABLE_NAME_1 + "(AccountID INTEGER PRIMARY KEY AUTOINCREMENT,BasicAmount TEXT)");
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int i, int i1) {

        db.execSQL("DROP TABLE IF EXISTS " + TABLE_NAME_1);
        onCreate(db);
    }


}
