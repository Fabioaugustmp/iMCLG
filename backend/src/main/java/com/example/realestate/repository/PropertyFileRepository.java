package com.example.realestate.repository;

import com.example.realestate.model.PropertyFile;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface PropertyFileRepository extends JpaRepository<PropertyFile, Long> {
}
