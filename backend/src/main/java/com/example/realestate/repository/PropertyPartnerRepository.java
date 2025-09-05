package com.example.realestate.repository;

import com.example.realestate.model.PropertyPartner;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface PropertyPartnerRepository extends JpaRepository<PropertyPartner, Long> {
}
