<%@ Page Title="" Language="C#" MasterPageFile="~/Site2.Master" AutoEventWireup="true" CodeBehind="admin_AssignDr.aspx.cs" Inherits="Hospital_Management_System_Ass.admin_AssignDr" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" runat="server">
     <div class="container">
         <div class="form-group">
      <label class="control-label col-sm-offset-2  col-sm-2" for="text">PatientId:</label>
      <div class ="col-sm-6">
          <asp:TextBox ID="txtPatientId" CssClass="form-control" runat="server"></asp:TextBox>
          <br />
      </div>    
    </div>

    <div class="form-group">
      <label class="control-label col-sm-offset-2  col-sm-2" for="text">FirstName:</label>
      <div class ="col-sm-6">
          <asp:TextBox ID="txtFirstName" CssClass="form-control" runat="server"></asp:TextBox>
          <br />
      </div>    
    </div>
        
    <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-2" for="text">LastName:</label>
      <div class="col-sm-6">          
          <asp:TextBox ID="txtLastName" CssClass="form-control" runat="server"></asp:TextBox>
          <br />
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-2" for="text">Age:</label>
      <div class="col-sm-6">          
          <asp:TextBox ID="txtAge" CssClass="form-control" runat="server"></asp:TextBox>
          <br />
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-2" for="text">Room Num:</label>
      <div class="col-sm-6">          
          <asp:TextBox ID="txtRoomNum" CssClass="form-control" runat="server"></asp:TextBox>
          <br />
      </div>
    </div>

          <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-2" for="text">Reason To Admit</label>
      <div class="col-sm-6">          
          <asp:TextBox ID="txtReason" CssClass="form-control" runat="server"></asp:TextBox>
          <br />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-offset-2  col-sm-2" for="text">Doctor Id:</label>
      <div class ="col-sm-6">
          <asp:TextBox ID="txtDrId" CssClass="form-control" runat="server"></asp:TextBox>
          <br />
      </div>    
    </div>

      <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-2" for="text">Main Doctor's First Name:</label>
      <div class="col-sm-6">          
          <asp:TextBox ID="txtDr1fname" CssClass="form-control" runat="server"></asp:TextBox>
          <br />
      </div>
    </div>
         <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-2" for="text">Main Doctor's Last Name:</label>
      <div class="col-sm-6">          
          <asp:TextBox ID="txtDr1lname" CssClass="form-control" runat="server"></asp:TextBox>
          <br />
      </div>
    </div>
           <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-2" for="text">Department of main Doctor:</label>
      <div class="col-sm-6">          
          <asp:TextBox ID="txtDepartment" CssClass="form-control" runat="server"></asp:TextBox>
          <br />
      </div>
    </div>

      
    </div>
        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-6">
        
          <asp:Button ID="btnAdd" CssClass="btn btn-danger" runat="server" Text="Assign Doctor" OnClick="btnAdd_Click"/>
          <asp:Button ID="btnLoad" CssClass="btn btn-danger" runat="server" Text="Search Patient" OnClick="btnLoad_Click"/>
          <asp:Button ID="btnUpdate" CssClass="btn btn-danger" runat="server" Text="Search Doctor" OnClick="btnUpdate_Click"/>
          <br />
                </div>
            </div>
          <asp:Label ID="lblDetail" runat="server" Text="Label"></asp:Label>
          <br />
   
   
</asp:Content>
