﻿<%@ Page Title="" Language="C#" MasterPageFile="~/Site2.Master" AutoEventWireup="true" CodeBehind="admin_addDoc.aspx.cs" Inherits="Hospital_Management_System_Ass.admin_addDoc" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
    
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" runat="server">
    <div class="container">
   <div class="form-group">
      <label class="control-label col-sm-offset-2  col-sm-2" for="text">DoctorId Id:</label>
          <div class ="col-sm-6">
          <asp:TextBox ID="txtDrId" CssClass="form-control" runat="server"></asp:TextBox>
              <br />
            </div>
        </div>
    <div class="form-group">
      <label class="control-label col-sm-offset-2  col-sm-2" for="text">Doctor'sFirstName:</label>
      <div class ="col-sm-6">
          <asp:TextBox ID="txtFirstName" CssClass="form-control" runat="server"></asp:TextBox>
          <br />
      </div>    
    </div>
        
    <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-2" for="text">Doctor'LastName:</label>
      <div class="col-sm-6">          
          <asp:TextBox ID="txtLastName" CssClass="form-control" runat="server"></asp:TextBox>
          <br />
      </div>
    </div>

      <div class="form-group">
        <label class="control-label col-sm-offset-2  col-sm-2" for="text">Set User Name:</label>
         <div class ="col-sm-6">
          <asp:TextBox ID="txtUserName" CssClass="form-control" runat="server"></asp:TextBox>
                  <br />
             </div>
          </div>

           <div class="form-group">
      <label class="control-label col-sm-offset-2  col-sm-2" for="text">Set Password:</label>
              <div class ="col-sm-6">
          <asp:TextBox ID="txtPassword" CssClass="form-control" runat="server"></asp:TextBox>
                  <br />
                  </div>
               </div>

     <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-2" for="text">Gender</label>
      <div class="col-sm-6">          
          <asp:TextBox ID="txtgender" CssClass="form-control" runat="server"></asp:TextBox>
          <br />
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-2" for="text">Address:</label>
      <div class="col-sm-6">          
          <asp:TextBox ID="txtAddress" CssClass="form-control" runat="server"></asp:TextBox>
          <br />
      </div>
    </div>

      <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-2" for="text">Department:</label>
      <div class="col-sm-6">          
          <asp:TextBox ID="txtDepartment" CssClass="form-control" runat="server"></asp:TextBox>
          <br />
      </div>
    </div>
         </div>
           
    <div class="form-group">
            <div class="col-sm-offset-5 col-sm-6">
          <asp:Button ID="btnAdd" CssClass="btn btn-danger" runat="server" Text="Add" OnClick="btnAdd_Click" />
          <asp:Button ID="btnLoad" CssClass="btn btn-danger" runat="server" Text="Search" OnClick="btnSearch_Click" />
          <asp:Button ID="btnUpdate" CssClass="btn btn-danger" runat="server" Text="Update" OnClick="btnUpdate_Click" />
          <asp:Button ID="btnDelete" CssClass="btn btn-danger" runat="server" Text="Delete" OnClick="btnDelete_Click" />
          <br />
            </div>
        </div>
          <asp:Label ID="lblDetail" runat="server" Text=""></asp:Label>
          <br />
</asp:Content>
