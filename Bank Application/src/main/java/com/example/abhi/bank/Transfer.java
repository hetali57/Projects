package com.example.abhi.bank;

import android.annotation.SuppressLint;
import android.content.Intent;
import android.database.Cursor;
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
import android.widget.Toast;

import java.util.ArrayList;
import java.util.List;

public class Transfer extends AppCompatActivity implements NavigationView.OnNavigationItemSelectedListener {

    //private Spinner planner;
    private Spinner plannerFrom;
    private Spinner plannerTo;
    private EditText mtransferAmount;
    Button balance;
    private Button transfer;
    DataBase DBase;
    public int total;
    private DrawerLayout mDrawerLayout;
    private ActionBarDrawerToggle mToggle;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_transfer);

        DBase = new DataBase(this);
        plannerFrom = (Spinner) findViewById(R.id.spinnerTo);
        plannerTo = (Spinner) findViewById(R.id.spinnerFrom);
        mtransferAmount = (EditText) findViewById(R.id.transferAmount);
        balance = (Button)findViewById(R.id.btnBalance);
        mDrawerLayout = (DrawerLayout) findViewById(R.id.main_drawer);
        mToggle = new ActionBarDrawerToggle(this, mDrawerLayout, R.string.navigation_drawer_open, R.string.navigation_drawer_close);

        mDrawerLayout.addDrawerListener(mToggle);
        mToggle.syncState();
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        @SuppressLint("CutPasteId")
        NavigationView navigationView = (NavigationView) findViewById(R.id.navigation_view);
        navigationView.getMenu().getItem(3).setChecked(true);
        navigationView.setNavigationItemSelectedListener(this);

        final List<String> listPlans = new ArrayList<String>();

        listPlans.add("BASIC PLAN");
        listPlans.add("SAVING PLAN");

        ArrayAdapter<String> dataAdapter2 = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_item, listPlans);
        dataAdapter2.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        plannerFrom.setAdapter(dataAdapter2);


        final List<String> listPlans2 = new ArrayList<String>();

        listPlans2.add("BASIC PLAN");
        listPlans2.add("SAVING PLAN");

        ArrayAdapter<String> dataAdapter3 = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_item, listPlans2);
        dataAdapter3.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        plannerTo.setAdapter(dataAdapter3);

        balance.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent myintent1 = new Intent(Transfer.this,DisplayAccountDetail.class);
                startActivity(myintent1);
            }

        });
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        if (mToggle.onOptionsItemSelected(item)) {
            return true;
        }
        return super.onOptionsItemSelected(item);
    }

    public void showData(String title, String mess) {
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setCancelable(true);
        builder.setTitle(title);
        builder.setMessage(mess);
        builder.show();
    }

    public void onTransfer(View view) {

        if (plannerFrom.getSelectedItem().equals("BASIC PLAN") && plannerTo.getSelectedItem().equals("SAVING PLAN")) {
            Cursor cursor = DBase.getBasicWithdrawAmount(Integer.parseInt(mtransferAmount.getText().toString()));
            Cursor cursor2 = DBase.getSavingDepositAmount(Integer.parseInt(mtransferAmount.getText().toString()));
            StringBuffer buffer = new StringBuffer();
            if (cursor.moveToLast()) {
                // display.append("Amount: " + cursor.getString(6));
                total = cursor.getInt(cursor.getColumnIndex(DataBase.COL_8));
                buffer.append(total);
            }
            if (cursor2.moveToLast()) {
                // display.append("Amount: " + cursor.getString(6));
                total = cursor2.getInt(cursor2.getColumnIndex(DataBase.COL_9));
                buffer.append(total);
            }
            //showData("Transfer History:", buffer.toString());
            Toast.makeText(Transfer.this,"Transfer Completed!!!", Toast.LENGTH_SHORT).show();
        }

        if (plannerFrom.getSelectedItem().equals("SAVING PLAN") && plannerTo.getSelectedItem().equals("BASIC PLAN")) {
            Cursor cursor = DBase.getSavingWithdrawAmount(Integer.parseInt(mtransferAmount.getText().toString()));
            Cursor cursor2 = DBase.getBasicDepositAmount(Integer.parseInt(mtransferAmount.getText().toString()));

            StringBuffer buffer = new StringBuffer();
            if (cursor.moveToLast()) {
                // display.append("Amount: " + cursor.getString(6));
                total = cursor.getInt(cursor.getColumnIndex(DataBase.COL_8));
                buffer.append(total);
            }
            if (cursor2.moveToLast()) {
                // display.append("Amount: " + cursor.getString(6));
                total = cursor2.getInt(cursor2.getColumnIndex(DataBase.COL_9));
                buffer.append(total);
            }
            //showData("Transfer History:", buffer.toString());
            Toast.makeText(Transfer.this,"Transfer Completed!!!", Toast.LENGTH_SHORT).show();
        }
    }

    @Override
    public boolean onNavigationItemSelected(@NonNull MenuItem item) {
        int id = item.getItemId();

        if (id == R.id.home) {
            Intent myintent1 = new Intent(Transfer.this, DisplayAccountDetail.class);
            startActivity(myintent1);
        }
        if (id == R.id.deposit) {
            Intent myintent2 = new Intent(Transfer.this, Deposit.class);
            startActivity(myintent2);
        }
        if (id == R.id.withdraw) {
            Intent myintent2 = new Intent(Transfer.this, Withdraw.class);
            startActivity(myintent2);
        }
        if (id == R.id.transfer) {
            Intent myintent2 = new Intent(Transfer.this, Transfer.class);
            startActivity(myintent2);
        }
        if(id==R.id.logout){
            Intent myintent2 = new Intent(Transfer.this,Login.class);
            startActivity(myintent2);
        }

        return false;
    }
}
