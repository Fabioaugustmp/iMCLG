
package com.example.realestate.service;

import com.example.realestate.model.Construction;
import com.example.realestate.repository.ConstructionRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;

@Service
public class ConstructionService {

    @Autowired
    private ConstructionRepository constructionRepository;

    public List<Construction> getAllConstructions() {
        return constructionRepository.findAll();
    }

    public Optional<Construction> getConstructionById(Long id) {
        return constructionRepository.findById(id);
    }

    public Construction saveConstruction(Construction construction) {
        return constructionRepository.save(construction);
    }

    public void deleteConstruction(Long id) {
        constructionRepository.deleteById(id);
    }
}
