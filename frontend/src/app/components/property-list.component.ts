import { Component, OnInit } from '@angular/core';
import { Property } from '../models/property.model';
import { PropertyService } from '../services/property.service';

@Component({
  selector: 'app-property-list',
  templateUrl: './property-list.component.html',
  styleUrls: ['./property-list.component.css']
})
export class PropertyListComponent implements OnInit {

  properties: Property[] = [];

  constructor(private propertyService: PropertyService) { }

  ngOnInit(): void {
    this.propertyService.getProperties().subscribe((data: Property[]) => {
      this.properties = data;
    });
  }
}
