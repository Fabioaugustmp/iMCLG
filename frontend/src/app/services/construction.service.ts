
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Construction } from '../models/construction';

@Injectable({
  providedIn: 'root'
})
export class ConstructionService {

  private apiUrl = '/api/constructions'; // Assumes a proxy is configured in angular.json

  constructor(private http: HttpClient) { }

  getConstructions(): Observable<Construction[]> {
    return this.http.get<Construction[]>(this.apiUrl);
  }

  getConstruction(id: number): Observable<Construction> {
    return this.http.get<Construction>(`${this.apiUrl}/${id}`);
  }

  createConstruction(construction: Construction): Observable<Construction> {
    return this.http.post<Construction>(this.apiUrl, construction);
  }

  updateConstruction(id: number, construction: Construction): Observable<Construction> {
    return this.http.put<Construction>(`${this.apiUrl}/${id}`, construction);
  }

  deleteConstruction(id: number): Observable<void> {
    return this.http.delete<void>(`${this.apiUrl}/${id}`);
  }
}
