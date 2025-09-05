
package com.example.realestate.controller;

import com.example.realestate.model.Construction;
import com.example.realestate.service.ConstructionService;
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
@RequestMapping("/api/constructions")
public class ConstructionController {

    @Autowired
    private ConstructionService constructionService;

    @GetMapping
    public List<Construction> getAllConstructions() {
        return constructionService.getAllConstructions();
    }

    @GetMapping("/{id}")
    public ResponseEntity<Construction> getConstructionById(@PathVariable Long id) {
        Optional<Construction> construction = constructionService.getConstructionById(id);
        return construction.map(ResponseEntity::ok).orElseGet(() -> ResponseEntity.notFound().build());
    }

    @PostMapping
    public Construction createConstruction(@RequestBody Construction construction) {
        return constructionService.saveConstruction(construction);
    }

    @PutMapping("/{id}")
    public ResponseEntity<Construction> updateConstruction(@PathVariable Long id, @RequestBody Construction constructionDetails) {
        Optional<Construction> constructionOptional = constructionService.getConstructionById(id);
        if (constructionOptional.isPresent()) {
            Construction existingConstruction = constructionOptional.get();
            existingConstruction.setName(constructionDetails.getName());
            existingConstruction.setDescription(constructionDetails.getDescription());
            existingConstruction.setStatus(constructionDetails.isStatus());
            return ResponseEntity.ok(constructionService.saveConstruction(existingConstruction));
        } else {
            return ResponseEntity.notFound().build();
        }
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<Void> deleteConstruction(@PathVariable Long id) {
        constructionService.deleteConstruction(id);
        return ResponseEntity.noContent().build();
    }
}
