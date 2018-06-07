<%-- 
    Document   : createAgent
    Created on : 12-Apr-2018, 4:25:37 PM
    Author     : Yogesh Joshi
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
        
        <title>Add Agent Page</title>
    </head>
    <body>
        <c:choose>
            <c:when test="${username=='admin'}">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <span class="navbar-brand mb-0 h1">PRINT MARKETING</span>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class='nav-item nav-link' href='createLocation.jsp'>Create Locations</a>
                            <a class='nav-item nav-link' href='createAgent.jsp'>Create Agents</a>
                            <a class='nav-item nav-link' href='listClients'>View Client Records</a>
                            <a class='nav-item nav-link' href='listOrders'>View Orders</a>
                        </div>
                    </div>
                    <form action="logout" method="post">
                        <button type="submit" class="btn btn-outline-success my-2 my-sm-0">
                            <c:out value="${username} (logout)"></c:out>
                        </button>
                    </form>
                </nav>
            </c:when>
            <c:otherwise>
                <script>window.location.href="login.jsp"</script>
            </c:otherwise>
        </c:choose>
        <center>
        <h2 style="margin-top: 50px">Add Marketing Agent</h2><br/>
        <form action="addAgent" method="post">
            <div class="form-inline col-md-2">
                <label>First Name: </label>&nbsp;
                <input class="form-control" type="text" name="firstName" id="firstName" />
            </div><br/>
            <div class="form-inline col-md-2">
                <label>Last Name: </label>&nbsp; 
                <input class="form-control" type="text" name="lastName" id="lastName" />
            </div><br/>
            <div class="form-inline col-md-2">
                <label>Phone No: </label>&nbsp;&nbsp;
                <input class="form-control" type="text" name="phoneNo" id="phoneNo" />
            </div><br/>
            <div class="form-inline col-md-2">
                <label>Email: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-control" type="text" name="email" id="email" />
            </div><br/>
            <div class="form-inline col-md-2">
                <label>Username: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-control" type="text" name="userName" id="userName" />
            </div><br/>
            <div class="form-inline col-md-2">
                <label>Password: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-control" type="password" name="password" id="password" />
            </div><br/>
            <div class="form-inline col-md-2">
                <label>Role: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-control" type="text" name="role" id="role" />
            </div><br/>
            <div class="form-group">
                <input class="btn btn-success" type="submit" name="submit" id="submit" value="Register"/>&nbsp;&nbsp;
                <button class="btn btn-success" type="button" name="view" onclick="window.location.href='listAgents'">View Agents</button>
            </div>
        </form>
        </center>
    </body>
</html>
