<%@ Page Title="" Language="C#" MasterPageFile="~/Site4.Master" AutoEventWireup="true" CodeBehind="DischargePatient.aspx.cs" Inherits="Hospital_Management_System_Ass.DischargePatient" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" runat="server">
     <div class="container">
          <div class="form-group">
      <label class="control-label col-sm-offset-2  col-sm-2" for="text">Patient Id:</label>
      <div class ="col-sm-6">
          <asp:TextBox ID="txtPId" CssClass="form-control" runat="server"></asp:TextBox><br />
    </div>
  </div>

    <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-2" for="text">FirstName:</label>
      <div class ="col-sm-6">
          <asp:TextBox ID="txtPfName" CssClass="form-control" runat="server"></asp:TextBox><br />
      </div>   
    </div>

    <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-2" for="text">LastName:</label>
      <div class="col-sm-6">          
          <asp:TextBox ID="txtPlName" CssClass="form-control" runat="server"></asp:TextBox>
          <br />
      </div>
    </div> 

         <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-2" for="text">Doctor Name:</label>
      <div class="col-sm-6">          
          <asp:TextBox ID="txtDrName" CssClass="form-control" runat="server"></asp:TextBox>
          <br />
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-2" for="text">Admit Date:</label>
      <div class="col-sm-6">          
             <asp:TextBox ID="txtAdmitDate" CssClass="form-control" runat="server"></asp:TextBox>
          <br />
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-2" for="text">Discharge Date:</label>
      <div class="col-sm-6">          
          <asp:TextBox ID="txtDischargeDate" CssClass="form-control" runat="server"></asp:TextBox>
          <br />
      </div>
    </div>

      <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-2" for="text">Reason To Admit:</label>
      <div class="col-sm-6">          
          <asp:TextBox ID="txtPreason" CssClass="form-control" runat="server"></asp:TextBox>
          <br />
      </div>
    </div>
  </div>

     <div class="form-group">
      <div class="col-sm-offset-5 col-sm-6">
          <asp:Button ID="btnUpdate" CssClass="btn btn-danger" runat="server" Text="Discharge Patient" OnClick="btnUpdate_Click"/>
         <asp:Button ID="btnSearch" CssClass="btn btn-danger" runat="server" Text="Search Profile" OnClick="btnSearch_Click"/>
         <br /><br /><asp:Label ID="lblDetail" runat="server" Text=""></asp:Label>
        </div>
       </div>
</asp:Content>
