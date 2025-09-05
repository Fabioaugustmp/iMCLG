package com.example.realestate.model;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.Table;
import java.time.LocalDate;

@Entity
@Table(name = "expenses")
public class Expense {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    @ManyToOne
    @JoinColumn(name = "id_propertie")
    private Property property;

    private String expensetype;
    private String classexpense;
    private LocalDate includedate;
    private LocalDate expiredate;
    private LocalDate paymentdate;
    private LocalDate competence;
    private Double value;
    private String observations;

    // Getters and Setters

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public Property getProperty() {
        return property;
    }

    public void setProperty(Property property) {
        this.property = property;
    }

    public String getExpensetype() {
        return expensetype;
    }

    public void setExpensetype(String expensetype) {
        this.expensetype = expensetype;
    }

    public String getClassexpense() {
        return classexpense;
    }

    public void setClassexpense(String classexpense) {
        this.classexpense = classexpense;
    }

    public LocalDate getIncludedate() {
        return includedate;
    }

    public void setIncludedate(LocalDate includedate) {
        this.includedate = includedate;
    }

    public LocalDate getExpiredate() {
        return expiredate;
    }

    public void setExpiredate(LocalDate expiredate) {
        this.expiredate = expiredate;
    }

    public LocalDate getPaymentdate() {
        return paymentdate;
    }

    public void setPaymentdate(LocalDate paymentdate) {
        this.paymentdate = paymentdate;
    }

    public LocalDate getCompetence() {
        return competence;
    }

    public void setCompetence(LocalDate competence) {
        this.competence = competence;
    }

    public Double getValue() {
        return value;
    }

    public void setValue(Double value) {
        this.value = value;
    }

    public String getObservations() {
        return observations;
    }

    public void setObservations(String observations) {
        this.observations = observations;
    }
}
