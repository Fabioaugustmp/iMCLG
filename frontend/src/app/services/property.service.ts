import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Property } from '../models/property.model';

@Injectable({
  providedIn: 'root'
})
export class PropertyService {

  private apiUrl = '/api/properties';

  constructor(private http: HttpClient) { }

  getProperties(): Observable<Property[]> {
    return this.http.get<Property[]>(this.apiUrl);
  }

  getProperty(id: number): Observable<Property> {
    return this.http.get<Property>(`${this.apiUrl}/${id}`);
  }

  createProperty(property: Property): Observable<Property> {
    return this.http.post<Property>(this.apiUrl, property);
  }

  updateProperty(id: number, property: Property): Observable<Property> {
    return this.http.put<Property>(`${this.apiUrl}/${id}`, property);
  }

  deleteProperty(id: number): Observable<void> {
    return this.http.delete<void>(`${this.apiUrl}/${id}`);
  }
}
