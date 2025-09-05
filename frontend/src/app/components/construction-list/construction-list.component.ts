import { Component, OnInit } from '@angular/core';
import { Construction } from '../../models/construction';
import { ConstructionService } from '../../services/construction.service';

@Component({
  selector: 'app-construction-list',
  templateUrl: './construction-list.component.html',
  styleUrls: ['./construction-list.component.css']
})
export class ConstructionListComponent implements OnInit {

  constructions: Construction[] = [];

  constructor(private constructionService: ConstructionService) { }

  ngOnInit(): void {
    this.constructionService.getConstructions().subscribe(data => {
      this.constructions = data;
    });
  }

}
