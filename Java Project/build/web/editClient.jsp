<%-- 
    Document   : editClient
    Created on : 16-Apr-2018, 2:49:08 PM
    Author     : Hetali Dholakiya
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
            <h1 style="margin-top: 50px">Edit clients</h1><br/>
            <form action="updateClient" method="post">
                <input type="hidden" name="id" id="id" value="${clients.id}"/>
                <div class="form-inline col-md-3">
                    <label>Agent Id: </label>&nbsp;
                    <input class="form-control" type="text" name="agentId" id="agentId" value="${clients.agentId}"/>
                </div><br/>
                <div class="form-inline col-md-3">
                    <label>First Name: </label>&nbsp;
                    <input class="form-control" type="text" name="fName" id="fName" value="${clients.firstName}"/>
                </div><br/>
                <div class="form-inline col-md-3">
                    <label>Last Name: </label>&nbsp; 
                    <input class="form-control" type="text" name="lName" id="lName" value="${clients.lastName}"/>
                </div><br/>
                <div class="form-inline col-md-3">
                    <label>Street Number: </label>&nbsp; 
                    <input class="form-control" type="text" name="stNum" id="stNum" value="${clients.streetNumber}"/>
                </div><br/>
                <div class="form-inline col-md-3">
                    <label>Street Name : </label>&nbsp; 
                    <input class="form-control" type="text" name="stName" id="stName" value="${clients.streetName}"/>
                </div><br/>
                <div class="form-inline col-md-3">
                    <label>City : </label>&nbsp; 
                    <input class="form-control" type="text" name="city" id="city" value="${clients.city}"/>
                </div><br/>
                <div class="form-inline col-md-3">
                    <label>Province : </label>&nbsp; 
                    <input class="form-control" type="text" name="province" id="province" value="${clients.province}"/>
                </div><br/>
                <div class="form-inline col-md-3">
                    <label>Postal Code : </label>&nbsp; 
                    <input class="form-control" type="text" name="postalCode" id="postalCode" value="${clients.postalCode}"/>
                </div><br/>
                <div class="form-inline col-md-3">
                    <label>Telephone Office : </label>&nbsp; 
                    <input class="form-control" type="text" name="telOffice" id="telOffice" value="${clients.telOffice}"/>
                </div><br/>
                <div class="form-inline col-md-3">
                    <label>Telephone Cell : </label>&nbsp; 
                    <input class="form-control" type="text" name="telCell" id="telCell" value="${clients.telCell}"/>
                </div><br/>
                <div class="form-inline col-md-3">
                    <label>Email : </label>&nbsp; 
                    <input class="form-control" type="text" name="emaill" id="emaill" value="${clients.email}"/>
                </div><br/>
                <div class="form-inline col-md-3">
                    <label>Company : </label>&nbsp; 
                    <input class="form-control" type="text" name="company" id="company" value="${clients.company}"/>
                </div><br/>
                <div class="form-inline col-md-3">
                    <label>Company Type : </label>&nbsp; 
                    <input class="form-control" type="text" name="companyType" id="companyType" value="${clients.companyType}"/>
                </div><br/>
               
                <div class="form-group">
                    <input class="btn btn-success" type="submit" name="submit" id="submit" value="Update"/>
                </div>
            </form>
        </center>
    </body>
</html>
