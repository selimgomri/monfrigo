import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';


@Injectable({
  providedIn: 'root'
})
export class ApiService {
  private $url = 'https://localhost:8000/api/ingredients';
  constructor(private http: HttpClient) {}

  getIngredients(): Observable<any> {
    return this.http.get<any>(this.$url);
  }
}
