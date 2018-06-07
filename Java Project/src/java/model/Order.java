
package model;


public class Order {
    int id;
    int agentId;
    int clientId;
    int flyerQty;
    String flyerLayout;
    //byte[] for BLOB
    byte[] flyerImg;
    int personalCopy;
    String paymentInformation;
    String invoiceNumber;
    String comments;
    int isFlyerArtAprroved;
    int isPaymentReceived;

    public Order() {
    }

    public Order(int id) {
        this.id = id;
    }

    public Order(int id, int agentId, int clientId, int flyerQty, String flyerLayout, byte[] flyerImg, int personalCopy, String paymentInformation, String invoiceNumber, String comments, int isFlyerArtAprroved, int isPaymentReceived) {
        this.id = id;
        this.agentId = agentId;
        this.clientId = clientId;
        this.flyerQty = flyerQty;
        this.flyerLayout = flyerLayout;
        this.flyerImg = flyerImg;
        this.personalCopy = personalCopy;
        this.paymentInformation = paymentInformation;
        this.invoiceNumber = invoiceNumber;
        this.comments = comments;
        this.isFlyerArtAprroved = isFlyerArtAprroved;
        this.isPaymentReceived = isPaymentReceived;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getAgentId() {
        return agentId;
    }

    public void setAgentId(int agentId) {
        this.agentId = agentId;
    }

    public int getClientId() {
        return clientId;
    }

    public void setClientId(int clientId) {
        this.clientId = clientId;
    }

    public int getFlyerQty() {
        return flyerQty;
    }

    public void setFlyerQty(int flyerQty) {
        this.flyerQty = flyerQty;
    }

    public String getFlyerLayout() {
        return flyerLayout;
    }

    public void setFlyerLayout(String flyerLayout) {
        this.flyerLayout = flyerLayout;
    }

    public byte[] getFlyerImg() {
        return flyerImg;
    }

    public void setFlyerImg(byte[] flyerImg) {
        this.flyerImg = flyerImg;
    }

    public int getPersonalCopy() {
        return personalCopy;
    }

    public void setPersonalCopy(int personalCopy) {
        this.personalCopy = personalCopy;
    }

    public String getPaymentInformation() {
        return paymentInformation;
    }

    public void setPaymentInformation(String paymentInformation) {
        this.paymentInformation = paymentInformation;
    }

    public String getInvoiceNumber() {
        return invoiceNumber;
    }

    public void setInvoiceNumber(String InvoiceNumber) {
        this.invoiceNumber = InvoiceNumber;
    }

    public String getComments() {
        return comments;
    }

    public void setComments(String comments) {
        this.comments = comments;
    }

    public int getIsFlyerArtAprroved() {
        return isFlyerArtAprroved;
    }

    public void setIsFlyerArtAprroved(int isFlyerArtAprroved) {
        this.isFlyerArtAprroved = isFlyerArtAprroved;
    }

    public int getIsPaymentReceived() {
        return isPaymentReceived;
    }

    public void setIsPaymentReceived(int isPaymentReceived) {
        this.isPaymentReceived = isPaymentReceived;
    }
}
