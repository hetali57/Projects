<%@ Page Title="" Language="C#" MasterPageFile="~/Site4.Master" AutoEventWireup="true" CodeBehind="OwnPatientHistory.aspx.cs" Inherits="Hospital_Management_System_Ass.OwnPatientHistory" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" runat="server">
    <asp:Label ID="lblName" runat="server" Text=""></asp:Label>
    <asp:GridView ID="grdList" CssClass="table" runat="server">
    </asp:GridView>
    <asp:TextBox ID="txtId" runat="server"></asp:TextBox>
    <asp:Button ID="txtSearch" runat="server" Text="Button" OnClick="txtSearch_Click" />
</asp:Content>
