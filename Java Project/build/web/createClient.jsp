<%-- 
    Document   : createClient
    Created on : 14-Apr-2018, 2:39:45 PM
    Author     : Hetali Dholakiya
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        <title>JSP Page</title>
    </head>
    <body>
        <c:choose>
            <c:when test="${username==null}">
                <script>window.location.href="login.jsp";</script>
            </c:when>
            <c:otherwise>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <span class="navbar-brand mb-0 h1">PRINT MARKETING</span>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class='nav-item nav-link' href='createClient.jsp'>Create Clients</a>
                            <a class='nav-item nav-link' href='createOrder.jsp'>Create Orders</a>
                        </div>
                    </div>
                    <form action="logout" method="post">
                        <button type="submit" class="btn btn-outline-success my-2 my-sm-0">
                            <c:out value="${username} (logout)"></c:out>
                        </button>
                    </form>
                </nav>
            </c:otherwise>
        </c:choose>
         <center>
        <h2 style="margin-top: 50px">Add Client</h2><br/>
        <form action="addClient" method="post">
            <div class="form-inline col-md-2">
                <label>Agent Id: </label>
                <input class="form-control" type="text" name="agentId" id="agentId" />
            </div><br/>
            <div class="form-inline col-md-2">
                <label>First Name: </label>
                <input class="form-control" type="text" name="firstName" id="firstName" />
            </div><br/>
            <div class="form-inline col-md-2">
                <label>Last Name: </label>
                <input class="form-control" type="text" name="lastName" id="lastName" />
            </div><br/>
            <div class="form-inline col-md-2">
                <label>Street Number: </label>
                <input class="form-control" type="text" name="stNum" id="stNum" />
            </div><br/>
            <div class="form-inline col-md-2">
                <label>Street Name: </label>
                <input class="form-control" type="text" name="stName" id="stName" />
            </div><br/>
            <div class="form-inline col-md-2">
                <label>City: </label> &nbsp;
                <input class="form-control" type="text" name="city" id="city" />
            </div><br/>
            <div class="form-inline col-md-2">
                <label>Province: </label>
                <input class="form-control" type="text" name="province" id="province" />
            </div><br/>
            <div class="form-inline col-md-2">
                <label>Postal code: </label>
                <input class="form-control" type="text" name="postalCode" id="postalCode" />
            </div><br/>
            <div class="form-inline col-md-2">
                <label>Telephone Office: </label>
                <input class="form-control" type="text" name="telOffice" id="telOffice" />
            </div><br/>
            <div class="form-inline col-md-2">
                <label>Telephone cell: </label>
                <input class="form-control" type="text" name="telCell" id="telCell" />
            </div><br/>
            <div class="form-inline col-md-2">
                <label>Email : </label>
                <input class="form-control" type="text" name="email" id="email" />
            </div><br/>
            <div class="form-inline col-md-2">
                <label>Company : </label>
                <input class="form-control" type="text" name="company" id="company" />
            </div><br/>
            <div class="form-inline col-md-2">
                <label>Company Type : </label>
                <input class="form-control" type="text" name="companyType" id="companyType" />
            </div><br/>
            <div class="form-group">
                <input class="btn btn-success" type="submit" name="submit" id="submit" value="Register"/>&nbsp;&nbsp;
                <button class="btn btn-success" type="button" name="view" onclick="window.location.href='listClients'">View Client</button>
            </div>
        </form>
    </center>
    </body>
</html>
