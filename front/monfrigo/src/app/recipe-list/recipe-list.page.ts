import { Component, Input, OnInit } from '@angular/core';
import { ApiService } from '../services/api.service';

@Component({
  selector: 'app-recipe-list',
  templateUrl: './recipe-list.page.html',
  styleUrls: ['./recipe-list.page.scss'],
})
export class RecipeListPage implements OnInit {
  @Input()
  public recipes!: any[];


  constructor(private api: ApiService) { }

  ngOnInit() {
    this.getRecipes();
  }

  getRecipes() {
    this.api.getRecipes().subscribe(response => {
      this.recipes = response['hydra:member'];
      console.log('response :', response['hydra:member']);
    });
  }

}
