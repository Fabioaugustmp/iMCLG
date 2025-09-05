package com.example.realestate.controller;

import com.example.realestate.model.Property;
import com.example.realestate.service.PropertyService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import java.util.List;
import java.util.Optional;

@RestController
@RequestMapping("/api/properties")
public class PropertyController {

    @Autowired
    private PropertyService propertyService;

    @GetMapping
    public List<Property> getAllProperties() {
        return propertyService.getAllProperties();
    }

    @GetMapping("/{id}")
    public ResponseEntity<Property> getPropertyById(@PathVariable Long id) {
        Optional<Property> property = propertyService.getPropertyById(id);
        return property.map(ResponseEntity::ok).orElseGet(() -> ResponseEntity.notFound().build());
    }

    @PostMapping
    public Property createProperty(@RequestBody Property property) {
        return propertyService.saveProperty(property);
    }

    @PutMapping("/{id}")
    public ResponseEntity<Property> updateProperty(@PathVariable Long id, @RequestBody Property propertyDetails) {
        Optional<Property> propertyOptional = propertyService.getPropertyById(id);
        if (propertyOptional.isPresent()) {
            Property property = propertyOptional.get();
            property.setName(propertyDetails.getName());
            property.setRealestate(propertyDetails.getRealestate());
            property.setStatusproperties(propertyDetails.getStatusproperties());
            property.setCep(propertyDetails.getCep());
            property.setLogradouro(propertyDetails.getLogradouro());
            property.setBairro(propertyDetails.getBairro());
            property.setCidade(propertyDetails.getCidade());
            property.setUf(propertyDetails.getUf());
            property.setAreatotal(propertyDetails.getAreatotal());
            property.setAreaconstruida(propertyDetails.getAreaconstruida());
            property.setValorvenal(propertyDetails.getValorvenal());
            property.setValordaaquisicao(propertyDetails.getValordaaquisicao());
            property.setDataaquisicao(propertyDetails.getDataaquisicao());
            property.setValordevenda(propertyDetails.getValordevenda());
            property.setDataavaliacao(propertyDetails.getDataavaliacao());
            property.setConstruction(propertyDetails.getConstruction());
            property.setCompany(propertyDetails.getCompany());
            property.setFeedback(propertyDetails.getFeedback());
            property.setLatitude(propertyDetails.getLatitude());
            property.setLongitude(propertyDetails.getLongitude());
            return ResponseEntity.ok(propertyService.saveProperty(property));
        } else {
            return ResponseEntity.notFound().build();
        }
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<Void> deleteProperty(@PathVariable Long id) {
        propertyService.deleteProperty(id);
        return ResponseEntity.noContent().build();
    }
}
