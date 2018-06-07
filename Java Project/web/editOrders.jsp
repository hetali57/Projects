<%-- 
    Document   : editOrders
    Created on : 23-Apr-2018, 1:42:16 PM
    Author     : Yogesh Joshi
--%>

<%@page import="java.util.ArrayList"%>
<%@page import="model.Locations"%>
<%@page import="dao.PrintDao"%>
<%@page import="service.PrintService"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>
<%@ taglib uri="http://java.sun.com/jsp/jstl/sql" prefix="sql"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                
        <title>Edit Orders</title>
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
            <h1 style="margin-top: 50px">Edit Orders</h1><br/>
            <form action="updateOrder" method="post">
                <input type="hidden" name="id" id="id" value="${order.id}"/>
                <div class="form-inline col-md-2">
                    <label>Clients:&nbsp;  </label>
                    <div class="form-group">
                        <select class="form-control" id="clientselection1" name="clients">
                            <sql:setDataSource var="ds" driver="com.mysql.jdbc.Driver" url="jdbc:mysql://localhost:3306/printmarketing" user="root" password=""/>
                            <sql:query dataSource="${ds}" var="result">
                                SELECT * from clients;
                            </sql:query>
                            <c:forEach var="row" items="${result.rows}">
                                <option value='<c:out value="${row.id}"/>'><c:out value="${row.firstName} ${row.lastName}"/></option>
                            </c:forEach>
                        </select>
                    </div>
                </div><br/>
                <div class="form-inline col-md-2">
                    <label>FlyerQty: </label>&nbsp;
                    <input class="form-control" type="text" name="quantity" id="quantity" value="${order.flyerQty}"/><br><br><br>
                </div>

                <div class="form-inline col-md-2">
                    <div class="form-group">
                        <label for="Flyerlayout">Flyer Layout: </label>&nbsp;
                        <select class="form-control" id="exampleFormControlSelect1" name="layouts">
                            <c:choose>
                                <c:when test="${order.flyerLayout == 'Portrait'}">
                                    <option>${order.flyerLayout}</option>
                                    <option>Landscape</option>
                                    <option>Both</option>
                                </c:when>
                                <c:when test="${order.flyerLayout == 'Landscape'}">
                                    <option>${order.flyerLayout}</option>
                                    <option>Portrait</option>
                                    <option>Both</option>
                                </c:when>
                                <c:otherwise>
                                    <option>Portrait</option>
                                    <option>Landscape</option>
                                    <option>${order.flyerLayout}</option>
                                </c:otherwise>
                            </c:choose>
                        </select>
                    </div>
                </div><br>

                <div class="form-inline col-md-2">
                    <label>Locations:&nbsp;  </label>
                    <div class="form-group">

                        <select class="form-control" id="selection1" name="location">
                            <sql:setDataSource var="ds" driver="com.mysql.jdbc.Driver" url="jdbc:mysql://localhost:3306/printmarketing" user="root" password=""/>
                            <sql:query dataSource="${ds}" var="result">
                                SELECT * from location;
                            </sql:query>
                            <c:forEach var="row" items="${result.rows}">   //ref set var 'result'
                                <option value='<c:out value="${row.id}"/>'><c:out value="${row.locationName}"/></option>
                            </c:forEach>
                        </select>
                    </div>
                </div><br>

                <div class="form-inline col-md-2">
                    <label>Sample image:</label>&nbsp;
                    <input type="file" name="pic" accept="image/*" ><br><br>
                </div>
                <div class="form-inline col-md-2">
                    <label>Personal Copy: </label>&nbsp;
                    <input class="form-control" type="text" name="personalCopy" id="quantity" value="${order.personalCopy}"/>
                </div><br/>
                <div class="form-inline col-md-2">
                    <label>Payment Information: </label>&nbsp;
                    <input class="form-control" type="text" name="paymentInfo" id="quantity" value="${order.paymentInformation}"/>
                </div><br/>
                <div class="form-inline col-md-2">
                    <label>Invoice#: </label>&nbsp;
                    <input class="form-control" type="text" name="invoicenum" id="quantity" value="${order.invoiceNumber}"/>
                </div><br/>
                <div class="form-inline col-md-2">
                    <label>Comments: </label>&nbsp;
                    <input class="form-control" type="text" name="comments" id="quantity" value="${order.comments}"/>
                </div><br/>

                <div class="form-group">
                    <input class="btn btn-success" type="submit" name="submit" id="submit" value="Update"/>
                </div>
            </form>
        </center>
    </body>
</html>
