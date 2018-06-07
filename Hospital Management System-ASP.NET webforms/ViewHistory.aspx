<%@ Page Title="" Language="C#" MasterPageFile="~/Site3.Master" AutoEventWireup="true" CodeBehind="ViewHistory.aspx.cs" Inherits="Hospital_Management_System_Ass.ViewHistory1" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" runat="server">
    <asp:Label ID="lblName" runat="server" Text=""></asp:Label>
    <asp:GridView ID="grdList" CssClass="table" runat="server">
    </asp:GridView>
</asp:Content>

