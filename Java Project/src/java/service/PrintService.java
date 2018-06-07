/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package service;

import dao.PrintDao;
import java.sql.SQLException;
import java.util.ArrayList;
import model.Clients;
import model.MarketingAgents;
import model.Locations;
import model.Login;
import model.Order;

/**
 *
 * @author Yogesh Joshi
 */
public class PrintService {
    
    //--------------------------- Login --------------------------------//
    public int login(String userName, String password, PrintDao printDao){
        int agentId = 0;
        Login loginObj = printDao.login(userName,password);
        if(loginObj.getUserName().equals(userName) && loginObj.getPassword().equals(password)){
            agentId = loginObj.getAgentId();
            return agentId;
        }
        else{
            return agentId;
        }
    }
    
    //--------------------------- Marketing Agents ----------------------------//
    public int createMarketingAgents(String firstName, String lastName, String phoneNo, String email, 
            String userName, String password, String role, PrintDao printDao){
        int res = 0;
        MarketingAgents agentObj = new MarketingAgents();
        Login loginObj = new Login();
        
        if(firstName!=null && lastName!=null && phoneNo!=null && email!=null && userName!=null && password!=null && role!=null){
            agentObj.setFirstName(firstName);
            agentObj.setLastName(lastName);
            agentObj.setPhoneNo(phoneNo);
            agentObj.setEmail(email);
            
            loginObj.setUserName(userName);
            loginObj.setPassword(password);
            loginObj.setRole(role);
            res = printDao.createMarketingAgents(agentObj, loginObj);
        }
        return res;
    }
    
    public ArrayList<MarketingAgents> readMarketingAgents(PrintDao printDao){
        ArrayList<MarketingAgents> agentsList = new ArrayList();
        agentsList = printDao.readMarketingAgents();
        return agentsList;
    }
    
    public MarketingAgents showAgentInfo(int id, PrintDao printDao) throws SQLException{
        MarketingAgents agent = printDao.showAgentInfo(id);    
        return agent;
    }
    
    public boolean updateMarketingAgent(MarketingAgents agent, PrintDao printDao){
        boolean result = printDao.updateMarketingAgent(agent);
        return result;
    }
    
    public boolean deleteMarketingAgent(int id, PrintDao printDao){
        boolean result = printDao.deleteMarketingAgent(id);
        return result;
    }
    
    //-------------------------------- Locations --------------------------------------//
    public int createLocations(String locationName, int distributionCapacity, PrintDao printDao) {
        int res = 0;
        Locations locationObj = new Locations();
     
        if(locationName != null) {
            locationObj.setLocationName(locationName);
            locationObj.setDistributionCapacity(distributionCapacity);
            res = printDao.createLocations(locationObj);
        }
        
        return res;
    }
    
    public ArrayList<Locations> readLocations(PrintDao printDao){
        ArrayList<Locations> locationsList = new ArrayList();
        locationsList = printDao.readLocations();
        return locationsList;
    }
    
    public Locations showLocationInfo(int id, PrintDao printDao) throws SQLException{
        Locations location = printDao.showLocationInfo(id);    
        return location;
    }
    
    public boolean updateLocationInfo(Locations location, PrintDao printDao){
        boolean result = printDao.updateLocationInfo(location);
        return result;
    }
    
    public boolean deleteLocation(int id, PrintDao printDao){
        boolean result = printDao.deleteLocation(id);
        return result;
    }

    //--------------------------------------- Marketing Orders ----------------------------------------------//
    public int createMarketingOrders(int locationId,int agentId, int clientId, int flyerQty, String flyerLayout, byte[] flyerImg, int personalCopy, String paymentInformation, String invoiceNumber, String comments, int isFlyerArtAprroved, int isPaymentReceived, PrintDao printDao) {
        int res = 0;
        Order orderObj = new Order();

        if (flyerLayout != null && flyerImg != null && paymentInformation != null && comments != null) {
            orderObj.setAgentId(agentId);
            orderObj.setClientId(clientId);
            orderObj.setFlyerQty(flyerQty);
            orderObj.setFlyerLayout(flyerLayout);
            orderObj.setFlyerImg(flyerImg);
            orderObj.setPersonalCopy(personalCopy);
            orderObj.setPaymentInformation(paymentInformation);
            orderObj.setInvoiceNumber(invoiceNumber);
            orderObj.setComments(comments);
            orderObj.setIsFlyerArtAprroved(isFlyerArtAprroved);
            orderObj.setIsPaymentReceived(isPaymentReceived);
            res = printDao.createMarketingOrders(orderObj,locationId);
        }
        return res;
    }

        
    public ArrayList<Order> readMarketingOrders(PrintDao printDao) {
        ArrayList<Order> ordersList = new ArrayList();
        ordersList = printDao.readMarketingOrders();
        return ordersList;
    }

    
    public Order showOrderInfo(int id, PrintDao printDao) throws SQLException {
        Order order = printDao.showOrderInfo(id);
        return order;
    }

    public boolean updateMarketingOrder(Order order, PrintDao printDao) {
        boolean result = printDao.updateMarketingOrder(order);
        return result;
    }
    
    public boolean deleteMarketingOrders(int id, PrintDao printDao) {
        boolean result = printDao.deleteMarketingOrder(id);
        return result;
    }
    
    public ArrayList<Locations> getLocations(PrintDao printDao){
        ArrayList<Locations> locations = new ArrayList<>();
        locations = printDao.getLocations();
        return locations;
    }
    
    //--------------------------------------- Clients ---------------------------------------------//
    public int createClients(int agentId,String firstName, String lastName, int stNum, String stName, String city, String province, String postalcode, String telOffice, String telCell, String email,String company, String companyType, PrintDao printDao){
        int res = 0;
        Clients clientObj = new Clients();
        
        if(agentId != 0 && firstName != null && lastName != null && stNum!= 0 && stName != null && city != null && province != null && postalcode != null && telOffice != null && telCell != null && email != null && company != null && companyType != null){
            clientObj.setAgentId(agentId);
            clientObj.setFirstName(firstName);
            clientObj.setLastName(lastName);
            clientObj.setStreetNumber(stNum);
            clientObj.setStreetName(stName);
            clientObj.setCity(city);
            clientObj.setProvince(province);
            clientObj.setPostalCode(postalcode);
            clientObj.setTelOffice(telOffice);
            clientObj.setTelCell(telCell);
            clientObj.setEmail(email);
            clientObj.setCompany(company);
            clientObj.setCompanyType(companyType);
            res = printDao.createClients(clientObj);
        }
        return res;
    }
    
    public ArrayList<Clients> readClients(PrintDao printDao){
        ArrayList<Clients> clientsList = new ArrayList();
        clientsList = printDao.readClients();
        return clientsList;
    }
     public Clients showClientInfo(int id, PrintDao printDao) throws SQLException{
        Clients client = printDao.showClientInfo(id);    
        return client;
    }
     
     public boolean updateClient(Clients client, PrintDao printDao) {
         boolean result = printDao.updateClient(client);
        return result;
    }
    
    public boolean deleteClient(int id, PrintDao printDao) {
        boolean result = printDao.deleteClient(id);
        return result;
    }
}
