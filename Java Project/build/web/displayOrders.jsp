<%-- 
    Document   : order
    Created on : 16-Apr-2018, 4:28:39 PM
    Author     : Shara
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="java.util.ArrayList"%>
<%@page import="model.MarketingAgents"%>
<%@page import="model.Order"%>
<%@taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        <title>View Orders Page</title>
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
            <h1 style="margin-top: 50px">List Of Orders</h1><br/>
            <c:if test="${username!='admin'}">
                <a href="createOrder.jsp">Add Order</a><br/><br/>
            </c:if>
            <table class="table-striped" cellpadding="5" border="1">
                <thead>
                    <th>id</th>
                    <th>Invoice #</th>
                    <th>Client Id</th>
                    <th>Flyer Image</th>
                    <th>Flyer Qty</th>
                    <th>Flyer Layout</th>
                    <th>Personal Copy</th>
                    <th>Payment information</th>
                    <th>Comment</th>
                    <th>Operations</th>
                </thead>
                <tbody>                
                <c:forEach var="order" items="${ordersList}">
                    <tr>
                        <td><c:out value="${order.id}"/></td>
                        <td><c:out value="${order.invoiceNumber}"/></td>
                        <td><c:out value="${order.clientId}"/></td>
                        <td><c:out value="${order.flyerImg}"/></td>
                        <td><c:out value="${order.flyerQty}"/></td>
                        <td><c:out value="${order.flyerLayout}"/></td>
                        <td><c:out value="${order.personalCopy}"/></td>
                        <td><c:out value="${order.paymentInformation}"/></td>
                        <td><c:out value="${order.comments}"/></td>
                        <td><a href="editOrder?id=<c:out value='${order.id}'/>">
                                Edit
                            </a>
                                &nbsp;&nbsp;&nbsp;
                            <a href="deleteOrder?id=<c:out value='${order.id}'/>">
                                Delete
                            </a>
                        </td>
                    </tr>
                </c:forEach>
                </tbody>
            </table>
        </center>
    </body>
</html>
