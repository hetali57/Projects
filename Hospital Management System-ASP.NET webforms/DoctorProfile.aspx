<%@ Page Title="" Language="C#" MasterPageFile="~/Site4.Master" AutoEventWireup="true" CodeBehind="DoctorProfile.aspx.cs" Inherits="Hospital_Management_System_Ass.DoctorProfile" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" runat="server">
    <div class="auto-style1">
          <div class="form-group">
      <label class="control-label col-sm-offset-2  col-sm-2" for="text">DoctorId:</label>
        <div class ="col-sm-6">
          <asp:TextBox ID="txtDrId" CssClass="form-control" runat="server"></asp:TextBox><br />
      </div>    
    </div>
    <div class="form-group">
      <label class="control-label col-sm-offset-2  col-sm-2" for="text">FirstName:</label>
      <div class ="col-sm-6">
          <asp:TextBox ID="txtDrfName" CssClass="form-control" runat="server"></asp:TextBox><br />
      </div>    
    </div>
        
    <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-2" for="text">LastName:</label>
      <div class="col-sm-6">          
          <asp:TextBox ID="txtDrlName" CssClass="form-control" runat="server"></asp:TextBox>
          <br />
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-2" for="text">Address:</label>
      <div class="col-sm-6">          
          <asp:TextBox ID="txtDrAddress" CssClass="form-control" runat="server"></asp:TextBox>
          <br />
      </div>
    </div>

        <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-2" for="text">Department:</label>
      <div class="col-sm-6">          
          <asp:TextBox ID="txtDrDepartment" CssClass="form-control" runat="server"></asp:TextBox>
          <br />
      </div>
    </div>

        <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-2" for="text">Gender:</label>
      <div class="col-sm-6">          
          <asp:TextBox ID="txtDrGender" CssClass="form-control" runat="server"></asp:TextBox>
          <br />
      </div>
        </div>
        </div>

     <div class="form-group">
            <div class="col-sm-offset-5 col-sm-6">
            <asp:Button ID="txtSearch" runat="server" CssClass="btn btn-danger" Text="Search" OnClick="btnSearch_Click" />
            <asp:Button ID="txtUpdate" runat="server" CssClass="btn btn-danger" Text="Update Profile" OnClick="btnUpdate_Click" />
            <asp:Label ID="lblDetail" runat="server" Text="Label"></asp:Label>
    </div>
        </div>
</asp:Content>
