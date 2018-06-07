/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

/**
 *
 * @author Yogesh Joshi
 */
public class Login {
    int id;
    String userName;
    String password;
    String role;
    int agentId;
    
    public Login(){
        
    }
    
    public Login(int id){
        this.id = id;
    }

    public Login(int id, String userName, String password, String role, int agentId) {
        this.id = id;
        this.userName = userName;
        this.password = password;
        this.role = role;
        this.agentId = agentId;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getUserName() {
        return userName;
    }

    public void setUserName(String userName) {
        this.userName = userName;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public String getRole() {
        return role;
    }

    public void setRole(String role) {
        this.role = role;
    }

    public int getAgentId() {
        return agentId;
    }

    public void setAgentId(int agentId) {
        this.agentId = agentId;
    }
}
