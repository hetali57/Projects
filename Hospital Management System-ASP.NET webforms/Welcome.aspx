<%@ Page Title="" Language="C#" MasterPageFile="~/Site1.Master" AutoEventWireup="true" CodeBehind="Welcome.aspx.cs" Inherits="Hospital_Management_System_Ass.WebForm1" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" runat="server">
    <div class="container">
        <div class="form-group">
        <div class="col-sm-offset-5 col-sm-10">
        <asp:Button ID="btnAdmin"  CssClass="btn btn-danger" runat="server" Text="USER LOGIN" OnClick="btnStart_Click" />
        </div>
            </div>
       </div>
        
</asp:Content>
