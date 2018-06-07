 <%-- 
    Document   : dispalyClient
    Created on : 14-Apr-2018, 3:45:11 PM
    Author     : Hetali Dholakiya
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="java.util.ArrayList"%>
<%@page import="model.Clients"%>
<%@taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>
<!DOCTYPE html>
<html>
    <head>
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
            <h1 style="margin-top: 50px">List Of Clients</h1><br/>
            <c:choose>
                <c:when test="${username!='admin'}">
                    <a href="createClient.jsp">Add Client</a><br/><br/>
                </c:when>
            </c:choose>
            <table class="table-striped" cellpadding="5" border="1">
                <thead>
                    <th>id</th>
                    <th>Agent id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Street Number</th>
                    <th>Street Name</th>
                    <th>City</th>
                    <th>Province</th>
                    <th>Postal code</th>
                    <th>Telephone office</th>
                    <th>Telephone cell</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th>Company type</th>
                    <c:choose>
                        <c:when test="${username=='admin'}">
                            <th>Operations</th>
                        </c:when>
                    </c:choose>
                </thead>
                <tbody>                
                <c:forEach var="clients" items="${clientsList}">
                    <tr>
                        <td><c:out value="${clients.id}"/></td>
                        <td><c:out value="${clients.agentId}"/></td>
                        <td><c:out value="${clients.firstName}"/></td>
                        <td><c:out value="${clients.lastName}"/></td>
                        <td><c:out value="${clients.streetNumber}"/></td>
                        <td><c:out value="${clients.streetName}"/></td>
                        <td><c:out value="${clients.city}"/></td>
                        <td><c:out value="${clients.province}"/></td>
                        <td><c:out value="${clients.postalCode}"/></td>
                        <td><c:out value="${clients.telOffice}"/></td>
                        <td><c:out value="${clients.telCell}"/></td>
                        <td><c:out value="${clients.email}"/></td>
                         <td><c:out value="${clients.company}"/></td>
                        <td><c:out value="${clients.companyType}"/></td>
                        <c:choose>
                            <c:when test="${username=='admin'}">
                                <td><a href="editClient?id=<c:out value='${clients.id}'/>">
                                        Edit
                                    </a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="deleteClient?id=<c:out value='${clients.id}'/>">
                                        Delete
                                    </a>
                                </td>
                            </c:when>
                        </c:choose>
                    </tr>
                </c:forEach>
                </tbody>
            </table>
        </center>
    </body>
</html>