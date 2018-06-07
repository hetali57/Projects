/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

/**
 *
 * @author Kyle Brooks
 */
public class Locations {
    int id;
    String locationName;
    int distributionCapacity;
    
    public Locations() {
        
    }
    
    public Locations(int id)
    {
        this.id = id;
    }
    
    public Locations(int id, String locationName, int distributionCapacity)
    {
        this.id = id;
        this.locationName = locationName;
        this.distributionCapacity = distributionCapacity;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getLocationName() {
        return locationName;
    }

    public void setLocationName(String locationName) {
        this.locationName = locationName;
    }

    public int getDistributionCapacity() {
        return distributionCapacity;
    }

    public void setDistributionCapacity(int distributionCapacity) {
        this.distributionCapacity = distributionCapacity;
    }
}
