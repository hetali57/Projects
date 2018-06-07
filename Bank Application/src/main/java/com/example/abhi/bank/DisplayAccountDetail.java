package com.example.abhi.bank;

import android.annotation.SuppressLint;
import android.app.Fragment;
import android.content.Intent;
import android.content.SharedPreferences;
import android.database.Cursor;
import android.graphics.drawable.Drawable;
import android.support.annotation.NonNull;
import android.support.design.widget.NavigationView;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.DragAndDropPermissions;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Spinner;
import android.widget.TextView;

import java.util.ArrayList;
import java.util.List;

public class DisplayAccountDetail extends AppCompatActivity implements NavigationView.OnNavigationItemSelectedListener {

    //private Spinner main;
    private TextView basicAmount;
    private TextView savingAmount;
    DataBase openHelper;
    Deposit dep;
    SharedPreferences myPrefs;
    private DrawerLayout mDrawerLayout;
    private ActionBarDrawerToggle mToggle;
    public static int basicBalance;
    public static int savingBalance;

    @SuppressLint("SetTextI18n")
    @Override
    protected void onCreate(Bundle savedInstanceState) {

        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_display_account_detail);
        basicAmount = findViewById(R.id.txtBasicAmount);
        savingAmount = findViewById(R.id.txtSavingAmount);
        mDrawerLayout = (DrawerLayout) findViewById(R.id.main_drawer);
        mToggle = new ActionBarDrawerToggle(this, mDrawerLayout, R.string.navigation_drawer_open, R.string.navigation_drawer_close);

        mDrawerLayout.addDrawerListener(mToggle);
        mToggle.syncState();
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        @SuppressLint("CutPasteId")
        NavigationView navigationView = (NavigationView)findViewById(R.id.navigation_view);
        navigationView.getMenu().getItem(0).setChecked(true);
        navigationView.setNavigationItemSelectedListener(this);

        openHelper = new DataBase(this);
        dep = new Deposit();

        Cursor cursor =  openHelper.getSum();

        if(cursor.getCount()==0)//no data available
        {
            dep.showData("Error","No Amount in database");
            return;
        }
        StringBuffer buffer = new StringBuffer();
        if(cursor.moveToFirst()){
            // display.append("Amount: " + cursor.getString(6));
            int total = cursor.getInt(cursor.getColumnIndex("BALANCE"));
                basicBalance();
                savingBalance();
                //basicAmount.setText("$ " + String.valueOf(dep.total));

        }
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        if(mToggle.onOptionsItemSelected(item)){
            return true;
        }
        return super.onOptionsItemSelected(item);
    }

    public void basicBalance(){
            myPrefs = getPreferences(MODE_PRIVATE);
            Cursor cursor = openHelper.getSum();

            if (cursor.getCount() == 0)//no data available
            {
                return;
            }
            if (cursor.moveToFirst()) {
                // display.append("Amount: " + cursor.getString(6));
                basicBalance = cursor.getInt(cursor.getColumnIndex("BALANCE"));
                basicAmount.setText("$ " + String.valueOf(basicBalance));

                SharedPreferences.Editor editor = myPrefs.edit();
                editor.putInt("keybasic",basicBalance);
                editor.commit();
            }
        }

        @SuppressLint("SetTextI18n")
        public void savingBalance(){
            myPrefs = getPreferences(MODE_PRIVATE);
            Cursor cursor = openHelper.getSavingSum();

            if (cursor.getCount() == 0)//no data available
            {
                return;
            }
            if (cursor.moveToFirst()) {
                // display.append("Amount: " + cursor.getString(6));
                savingBalance = cursor.getInt(cursor.getColumnIndex("SAVINGS"));
                savingAmount.setText("$ " + String.valueOf(savingBalance));

                SharedPreferences.Editor editor = myPrefs.edit();
                editor.putInt("keysaving",savingBalance);
                editor.commit();
            }
        }

    @Override
    public boolean onNavigationItemSelected(@NonNull MenuItem item) {
        int id = item.getItemId();

        if( id == R.id.home){
            Intent myintent1 = new Intent(DisplayAccountDetail.this,DisplayAccountDetail.class);
            startActivity(myintent1);
        }
        if( id == R.id.deposit){
            Intent myintent2 = new Intent(DisplayAccountDetail.this,Deposit.class);
            startActivity(myintent2);
        }
        if( id == R.id.withdraw){
            Intent myintent2 = new Intent(DisplayAccountDetail.this,Withdraw.class);
            startActivity(myintent2);
        }
        if( id == R.id.transfer){
            Intent myintent2 = new Intent(DisplayAccountDetail.this,Transfer.class);
            startActivity(myintent2);
        }

        if(id==R.id.logout){
            Intent myintent2 = new Intent(DisplayAccountDetail.this,Login.class);
            startActivity(myintent2);
        }

        return false;
    }

}

