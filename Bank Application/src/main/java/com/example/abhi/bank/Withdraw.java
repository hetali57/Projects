package com.example.abhi.bank;

import android.annotation.SuppressLint;
import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.support.annotation.NonNull;
import android.support.design.widget.NavigationView;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import java.io.Console;
import java.util.ArrayList;
import java.util.List;

public class Withdraw extends AppCompatActivity implements NavigationView.OnNavigationItemSelectedListener {

    private Spinner planSpin;
    DataBase database;
    private Button withdrawl, viewBal;
    public int totalAfterwithdrawl;
    private EditText withdrawBalance;
    private DrawerLayout mDrawerLayout;
    private ActionBarDrawerToggle mToggle;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_withdraw);
        database = new DataBase(this);

        withdrawl = (Button)findViewById(R.id.btnAction);
        viewBal = (Button)findViewById(R.id.btnViewBal);
        //spinMain = (Spinner) findViewById(R.id.spinnerMain);
        planSpin = (Spinner) findViewById(R.id.plannerSpinner);

        mDrawerLayout = (DrawerLayout) findViewById(R.id.main_drawer);
        mToggle = new ActionBarDrawerToggle(this, mDrawerLayout, R.string.navigation_drawer_open, R.string.navigation_drawer_close);

        mDrawerLayout.addDrawerListener(mToggle);
        mToggle.syncState();
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        @SuppressLint("CutPasteId")
        NavigationView navigationView = (NavigationView)findViewById(R.id.navigation_view);
        navigationView.getMenu().getItem(2).setChecked(true);
        navigationView.setNavigationItemSelectedListener(this);

        List<String> listPlans = new ArrayList<String>();

        listPlans.add("BASIC PLAN");
        listPlans.add("SAVING PLAN");

        ArrayAdapter<String> dataAdapter2 = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item,listPlans);
        dataAdapter2.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        planSpin.setAdapter(dataAdapter2);

        planSpin.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> adapterView, View view, int i, long l) {
                switch (i) {
                    case 0:
                        withdrawFromBasic();
                        break;

                    case 1:
                        withdrawFromSaving();
                        break;

                    default:

                }
            }

            @Override
            public void onNothingSelected(AdapterView<?> adapterView) {

            }
        });

        viewBal.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent myintent1 = new Intent(Withdraw.this,DisplayAccountDetail.class);
                startActivity(myintent1);
            }

        });
    }


    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        if(mToggle.onOptionsItemSelected(item)){
            return true;
        }
        return super.onOptionsItemSelected(item);
    }


    public void showData(String title,String mess){
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setCancelable(true);
        builder.setTitle(title);
        builder.setMessage(mess);
        builder.show();
    }

    public void withdrawFromBasic(){
        withdrawBalance = (EditText) findViewById(R.id.edtWithdrawAmount);
        withdrawl.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                try {
                    if (planSpin.getSelectedItem().toString().equals("BASIC PLAN")) {
                        Cursor cursor = database.getBasicWithdrawAmount(Integer.parseInt(withdrawBalance.getText().toString()));

                        if (DisplayAccountDetail.basicBalance == 0 || DisplayAccountDetail.basicBalance < Integer.parseInt(withdrawBalance.getText().toString())) {
                            Toast.makeText(Withdraw.this, "Not enough balance", Toast.LENGTH_SHORT).show();
                        } else {
                            if (cursor.moveToFirst()) {

                                // display.append("Amount: " + cursor.getString(6));
                                totalAfterwithdrawl = cursor.getInt(cursor.getColumnIndex("BALANCE"));
                                //buffer.append();
                                Toast.makeText(Withdraw.this, "Amount Withdraw Successfully from Basic Plan!!!", Toast.LENGTH_SHORT).show();

                            }
                        }
                        Toast.makeText(Withdraw.this, "Amount Withdraw Successfully from Basic Plan!!!", Toast.LENGTH_SHORT).show();
                        withdrawBalance.setText("");
                    }
                }
                catch (Exception ex){

                }
            }
        });
    }

    public void withdrawFromSaving(){
        withdrawBalance = (EditText) findViewById(R.id.edtWithdrawAmount);
        withdrawl.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(planSpin.getSelectedItem().toString().equals("SAVING PLAN")){
                    Cursor cursor = database.getSavingWithdrawAmount(Integer.parseInt(withdrawBalance.getText().toString()));

                    if(DisplayAccountDetail.savingBalance == 0 || DisplayAccountDetail.savingBalance < Integer.parseInt(withdrawBalance.getText().toString())){
                        Toast.makeText(Withdraw.this, "Not enough balance",Toast.LENGTH_SHORT).show();
                    }
                    else {
                        if (cursor.moveToFirst()) {

                            // display.append("Amount: " + cursor.getString(6));
                            totalAfterwithdrawl = cursor.getInt(cursor.getColumnIndex("SAVINGS"));
                            //buffer.append();
                            Toast.makeText(Withdraw.this,"Amount Withdraw Successfully from Saving Account!!!", Toast.LENGTH_SHORT).show();
                        }
                    }
                }
                //showData("Deposit History:",buffer.toString());
            }
        });
    }

    @Override
    public boolean onNavigationItemSelected(@NonNull MenuItem item) {
        int id = item.getItemId();

        if( id == R.id.home){
            Intent myintent1 = new Intent(Withdraw.this,DisplayAccountDetail.class);
            startActivity(myintent1);
        }
        if( id == R.id.deposit){
            Intent myintent2 = new Intent(Withdraw.this,Deposit.class);
            startActivity(myintent2);
        }
        if( id == R.id.transfer){
            Intent myintent2 = new Intent(Withdraw.this,Transfer.class);
            startActivity(myintent2);
        }
        if(id==R.id.logout){
            Intent myintent2 = new Intent(Withdraw.this,Login.class);
            startActivity(myintent2);
        }

        return false;
    }
}
