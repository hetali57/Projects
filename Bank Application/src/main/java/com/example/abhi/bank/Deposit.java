package com.example.abhi.bank;

import android.annotation.SuppressLint;
import android.content.ContentValues;
import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.support.annotation.NonNull;
import android.support.design.widget.NavigationView;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Display;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.List;

public class Deposit extends AppCompatActivity implements NavigationView.OnNavigationItemSelectedListener{

    //private Spinner plan;
    private Button deposit,viewBalance;
    private EditText mAmount;
    private TextView display;
    private Spinner deptSpinner;
    private DrawerLayout mDrawerLayout;
    private ActionBarDrawerToggle mToggle;
   // SQLiteOpenHelper OpenHelper;
   // SQLiteDatabase db;
    DataBase myDB;
    //AccountDataBase myAccDB;
    public int total;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_deposit);
        myDB = new DataBase(this);

       // OpenHelper = new DataBase(this);
        //myAccDB = new AccountDataBase(this);

        //plan = (Spinner) findViewById(R.id.planspinner);
        mAmount = (EditText) findViewById(R.id.edtAmount);
        display = (TextView) findViewById(R.id.txtdisplay);
        deptSpinner = (Spinner) findViewById(R.id.deptPlanSpinner);

        mDrawerLayout = (DrawerLayout) findViewById(R.id.main_drawer);
        mToggle = new ActionBarDrawerToggle(this, mDrawerLayout, R.string.navigation_drawer_open, R.string.navigation_drawer_close);

        mDrawerLayout.addDrawerListener(mToggle);
        mToggle.syncState();
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        @SuppressLint("CutPasteId")
        NavigationView navigationView = (NavigationView)findViewById(R.id.navigation_view);
        navigationView.getMenu().getItem(1).setChecked(true);
        navigationView.setNavigationItemSelectedListener(this);

        List<String> listPlans = new ArrayList<String>();

        listPlans.add("BASIC PLAN");
        listPlans.add("SAVING PLAN");

        ArrayAdapter<String> dataAdapter2 = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item,listPlans);
        dataAdapter2.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        deptSpinner.setAdapter(dataAdapter2);

        deptSpinner.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> adapterView, View view, int i, long l) {
                switch (i) {
                    case 0:
                        depositBasic();

                        break;

                    case 1:
                        depositSaving();
                        break;
                    default:
                }
            }

            @Override
            public void onNothingSelected(AdapterView<?> adapterView) {

            }
        });

        viewBalance = (Button) findViewById(R.id.btnViewBalance);

        viewBalance.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent myintent1 = new Intent(Deposit.this,DisplayAccountDetail.class);
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

    /*public void onDeposit(View view) {
        int basic = plan.getSelectedItemPosition();
        int saving = plan.getSelectedItemPosition();
        Double amount = Double.parseDouble(mAmount.getText().toString());

    }*/


    public void showData(String title,String mess){
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setCancelable(true);
        builder.setTitle(title);
        builder.setMessage(mess);
        builder.show();
    }

    public void depositBasic(){
        deposit = (Button) findViewById(R.id.btnDeposit);

        deposit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Cursor cursor = myDB.getBasicDepositAmount(Integer.parseInt(mAmount.getText().toString()));

                StringBuffer buffer = new StringBuffer();
                if (cursor.moveToLast()) {
                    // display.append("Amount: " + cursor.getString(6));
                    total = cursor.getInt(cursor.getColumnIndex(DataBase.COL_8));
                    buffer.append(total);
                }
                //showData("Deposit History:", buffer.toString());
                Toast.makeText(Deposit.this,"Amount Deposited Successfully in Basic Plan!!!", Toast.LENGTH_SHORT).show();
            }

        });
    }

    public void depositSaving(){
        deposit = (Button) findViewById(R.id.btnDeposit);

        deposit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Cursor cursor = myDB.getSavingDepositAmount(Integer.parseInt(mAmount.getText().toString()));

                StringBuffer buffer = new StringBuffer();
                if (cursor.moveToLast()) {
                    // display.append("Amount: " + cursor.getString(6));
                    total = cursor.getInt(cursor.getColumnIndex(DataBase.COL_9));
                    buffer.append(total);
                }
                //showData("Deposit History:", buffer.toString());
                Toast.makeText(Deposit.this,"Amount Deposited Successfully in Saving Account!!!", Toast.LENGTH_SHORT).show();
            }

        });
    }


    @Override
    public boolean onNavigationItemSelected(@NonNull MenuItem item) {
        int id = item.getItemId();

        if( id == R.id.home){
            Intent myintent1 = new Intent(Deposit.this,DisplayAccountDetail.class);
            startActivity(myintent1);
        }
        if( id == R.id.deposit){
            Intent myintent2 = new Intent(Deposit.this,Deposit.class);
            startActivity(myintent2);
        }
        if( id == R.id.withdraw){
            Intent myintent2 = new Intent(Deposit.this,Withdraw.class);
            startActivity(myintent2);
        }
        if( id == R.id.transfer){
            Intent myintent2 = new Intent(Deposit.this,Transfer.class);
            startActivity(myintent2);
        }
        if(id==R.id.logout){
            Intent myintent2 = new Intent(Deposit.this,Login.class);
            startActivity(myintent2);
        }

        return false;
    }
}
