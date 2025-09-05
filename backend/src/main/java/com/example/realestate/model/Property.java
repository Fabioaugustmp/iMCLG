package com.example.realestate.model;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.CascadeType;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.OneToMany;
import javax.persistence.Table;
import java.time.LocalDate;
import java.util.List;

@Entity
@Table(name = "properties")
public class Property {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    private String name;
    private String realestate;
    private String statusproperties;
    private String cep;
    private String logradouro;
    private String bairro;
    private String cidade;
    private String uf;
    private String areatotal;
    private String areaconstruida;
    private String valorvenal;
    private String valordaaquisicao;
    private LocalDate dataaquisicao;
    private String valordevenda;
    private LocalDate dataavaliacao;
    private String construction;
    private String company;
    private String feedback;
    private String latitude;
    private String longitude;

    @OneToMany(mappedBy = "property", cascade = CascadeType.ALL)
    private List<PropertyImage> images;

    @OneToMany(mappedBy = "property", cascade = CascadeType.ALL)
    private List<Expense> expenses;

    @OneToMany(mappedBy = "property", cascade = CascadeType.ALL)
    private List<PropertyFile> files;

    @OneToMany(mappedBy = "property", cascade = CascadeType.ALL)
    private List<PropertyPartner> partners;

    // Getters and Setters

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getRealestate() {
        return realestate;
    }

    public void setRealestate(String realestate) {
        this.realestate = realestate;
    }

    public String getStatusproperties() {
        return statusproperties;
    }

    public void setStatusproperties(String statusproperties) {
        this.statusproperties = statusproperties;
    }

    public String getCep() {
        return cep;
    }

    public void setCep(String cep) {
        this.cep = cep;
    }

    public String getLogradouro() {
        return logradouro;
    }

    public void setLogradouro(String logradouro) {
        this.logradouro = logradouro;
    }

    public String getBairro() {
        return bairro;
    }

    public void setBairro(String bairro) {
        this.bairro = bairro;
    }

    public String getCidade() {
        return cidade;
    }

    public void setCidade(String cidade) {
        this.cidade = cidade;
    }

    public String getUf() {
        return uf;
    }

    public void setUf(String uf) {
        this.uf = uf;
    }

    public String getAreatotal() {
        return areatotal;
    }

    public void setAreatotal(String areatotal) {
        this.areatotal = areatotal;
    }

    public String getAreaconstruida() {
        return areaconstruida;
    }

    public void setAreaconstruida(String areaconstruida) {
        this.areaconstruida = areaconstruida;
    }

    public String getValorvenal() {
        return valorvenal;
    }

    public void setValorvenal(String valorvenal) {
        this.valorvenal = valorvenal;
    }

    public String getValordaaquisicao() {
        return valordaaquisicao;
    }

    public void setValordaaquisicao(String valordaaquisicao) {
        this.valordaaquisicao = valordaaquisicao;
    }

    public LocalDate getDataaquisicao() {
        return dataaquisicao;
    }

    public void setDataaquisicao(LocalDate dataaquisicao) {
        this.dataaquisicao = dataaquisicao;
    }

    public String getValordevenda() {
        return valordevenda;
    }

    public void setValordevenda(String valordevenda) {
        this.valordevenda = valordevenda;
    }

    public LocalDate getDataavaliacao() {
        return dataavaliacao;
    }

    public void setDataavaliacao(LocalDate dataavaliacao) {
        this.dataavaliacao = dataavaliacao;
    }

    public String getConstruction() {
        return construction;
    }

    public void setConstruction(String construction) {
        this.construction = construction;
    }

    public String getCompany() {
        return company;
    }

    public void setCompany(String company) {
        this.company = company;
    }

    public String getFeedback() {
        return feedback;
    }

    public void setFeedback(String feedback) {
        this.feedback = feedback;
    }

    public String getLatitude() {
        return latitude;
    }

    public void setLatitude(String latitude) {
        this.latitude = latitude;
    }

    public String getLongitude() {
        return longitude;
    }

    public void setLongitude(String longitude) {
        this.longitude = longitude;
    }

    public List<PropertyImage> getImages() {
        return images;
    }

    public void setImages(List<PropertyImage> images) {
        this.images = images;
    }

    public List<Expense> getExpenses() {
        return expenses;
    }

    public void setExpenses(List<Expense> expenses) {
        this.expenses = expenses;
    }

    public List<PropertyFile> getFiles() {
        return files;
    }

    public void setFiles(List<PropertyFile> files) {
        this.files = files;
    }

    public List<PropertyPartner> getPartners() {
        return partners;
    }

    public void setPartners(List<PropertyPartner> partners) {
        this.partners = partners;
    }
}
