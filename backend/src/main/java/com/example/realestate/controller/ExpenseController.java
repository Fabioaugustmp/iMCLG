package com.example.realestate.controller;

import com.example.realestate.model.Expense;
import com.example.realestate.service.ExpenseService;
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
@RequestMapping("/api/expenses")
public class ExpenseController {

    @Autowired
    private ExpenseService expenseService;

    @GetMapping
    public List<Expense> getAllExpenses() {
        return expenseService.getAllExpenses();
    }

    @GetMapping("/{id}")
    public ResponseEntity<Expense> getExpenseById(@PathVariable Long id) {
        Optional<Expense> expense = expenseService.getExpenseById(id);
        return expense.map(ResponseEntity::ok).orElseGet(() -> ResponseEntity.notFound().build());
    }

    @PostMapping
    public Expense createExpense(@RequestBody Expense expense) {
        return expenseService.saveExpense(expense);
    }

    @PutMapping("/{id}")
    public ResponseEntity<Expense> updateExpense(@PathVariable Long id, @RequestBody Expense expenseDetails) {
        Optional<Expense> expenseOptional = expenseService.getExpenseById(id);
        if (expenseOptional.isPresent()) {
            Expense expense = expenseOptional.get();
            expense.setProperty(expenseDetails.getProperty());
            expense.setExpensetype(expenseDetails.getExpensetype());
            expense.setClassexpense(expenseDetails.getClassexpense());
            expense.setIncludedate(expenseDetails.getIncludedate());
            expense.setExpiredate(expenseDetails.getExpiredate());
            expense.setPaymentdate(expenseDetails.getPaymentdate());
            expense.setCompetence(expenseDetails.getCompetence());
            expense.setValue(expenseDetails.getValue());
            expense.setObservations(expenseDetails.getObservations());
            return ResponseEntity.ok(expenseService.saveExpense(expense));
        } else {
            return ResponseEntity.notFound().build();
        }
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<Void> deleteExpense(@PathVariable Long id) {
        expenseService.deleteExpense(id);
        return ResponseEntity.noContent().build();
    }
}
