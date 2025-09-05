package com.example.realestate.repository;

import com.example.realestate.model.StatusProperties;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface StatusPropertiesRepository extends JpaRepository<StatusProperties, Long> {
}
