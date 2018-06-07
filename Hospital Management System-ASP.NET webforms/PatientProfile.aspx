<%@ Page Title="" Language="C#" MasterPageFile="~/Site3.Master" AutoEventWireup="true" CodeBehind="PatientProfile.aspx.cs" Inherits="Hospital_Management_System_Ass.PatientProfile1" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" runat="server">
      <div class="container">
          <div class="form-group">
      <label class="control-label col-sm-offset-2  col-sm-2" for="text">PatientId:</label>
      <div class ="col-sm-6">
          <asp:TextBox ID="txtPId" CssClass="form-control" runat="server"></asp:TextBox><br />
      </div>    
    </div>
    <div class="form-group">
      <label class="control-label col-sm-offset-2  col-sm-2" for="text">FirstName:</label>
      <div class ="col-sm-6">
          <asp:TextBox ID="txtPfName" CssClass="form-control" runat="server"></asp:TextBox><br />
      </div>    
    </div>
        
    <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-2" for="text">LastName:</label>
      <div class="col-sm-6">          
          <asp:TextBox ID="txtPlName" CssClass="form-control" runat="server"></asp:TextBox><br />
          
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-2" for="text">Age:</label>
      <div class="col-sm-6">          
          <asp:TextBox ID="txtPAge" CssClass="form-control" runat="server"></asp:TextBox>
          <br />
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-2" for="text">Address:</label>
      <div class="col-sm-6">          
          <asp:TextBox ID="txtPaddress" CssClass="form-control" runat="server"></asp:TextBox>
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

      <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-2" for="text">Room Num:</label>
        <div class="col-sm-6">
          <asp:TextBox ID="txtProomNum" CssClass="form-control" runat="server"></asp:TextBox><br />
            </div>
          </div>
          </div>
         <div class="form-group">
            <div class="col-sm-offset-6 col-sm-6">
          <asp:Button ID="btnUpdate" CssClass="btn btn-danger" runat="server" Text="Update Profile" OnClick="btnUpdate_Click"/>
          </div>
             </div>
      <asp:Label ID="lblDetail" runat="server" Text="Label"></asp:Label>
</asp:Content>
