package com.example.abhi.bank;

import android.content.ContentValues;
import android.content.Intent;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.CompoundButton;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class SignUp extends AppCompatActivity {

    SQLiteOpenHelper mOpenHelper;
    SQLiteDatabase db;
    Button btnReg;
    EditText txtFname , txtLname, txtCardNum, txtPassword, txtConfirmPassword;
    private TextView userLogin;
    CheckBox mCheckBox;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_sign_up);

        mOpenHelper = new DataBase(this);

        btnReg = (Button) findViewById(R.id.btnRegister);
        txtFname = (EditText) findViewById(R.id.edtFirstName);
        txtLname = (EditText) findViewById(R.id.edtLastName);
        txtCardNum = (EditText) findViewById(R.id.edtSetCardNum);
        txtPassword = (EditText)findViewById(R.id.edtPassword);
        txtConfirmPassword = (EditText) findViewById(R.id.edtConfirmPassword);
        userLogin = (TextView)findViewById(R.id.txtLogin);
        mCheckBox = (CheckBox)findViewById(R.id.chkTerms);

        btnReg.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                db = mOpenHelper.getWritableDatabase();
                String fname = txtFname.getText().toString();
                String lname = txtLname.getText().toString();
                String paswrd = txtPassword.getText().toString();
                String conPaswrd = txtConfirmPassword.getText().toString();
                String  crdNum = txtCardNum.getText().toString();

                boolean result = false;

                if(fname.isEmpty() && lname.isEmpty() && crdNum.isEmpty() && paswrd.isEmpty() && conPaswrd.isEmpty()){
                    Toast.makeText(SignUp.this,"Please Enter All The Details For Sign Up", Toast.LENGTH_LONG).show();
                    txtCardNum.setError("Must Enter Card Number");
                }
                if(!mCheckBox.isChecked()){
                    mCheckBox.setError("* Must agree");
                }
                if(!(paswrd.equals(conPaswrd))){
                    txtConfirmPassword.setError("* Both Password Must match");
                }
                else {
                    result = true;
                    insertdata(fname,lname,crdNum,paswrd,conPaswrd);
                    Toast.makeText(getApplicationContext(),"REGISTER SUCCESSFULL!!!",Toast.LENGTH_LONG).show();
                }

            }

        });


        mCheckBox.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener()
        {
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked)
            {
                if ( isChecked )
                {
                    btnReg.setEnabled(true);

                }else{
                    btnReg.setEnabled(false);
                    Toast.makeText(SignUp.this,"You must Agree Terms and Condition!!", Toast.LENGTH_SHORT).show();
                }

            }
        });

        userLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(SignUp.this,Login.class));
            }
        });

    }
    public  void insertdata(String fname,String lname,String cardNum,String passwrd,String conPasswrd){
        ContentValues contentValues = new ContentValues(); // by this class we can write values in data base
        contentValues.put(DataBase.COL_2,fname);
        contentValues.put(DataBase.COL_3,lname);
        contentValues.put(DataBase.COL_4,cardNum);
        contentValues.put(DataBase.COL_5,passwrd);
        contentValues.put(DataBase.COL_6,conPasswrd);
        long id = db.insert(DataBase.TABLE_NAME, null, contentValues);
    }
}
