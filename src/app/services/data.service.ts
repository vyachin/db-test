import {Injectable} from '@angular/core';
import {Data} from '../entities/data.entity';
import {HttpClient} from "@angular/common/http";
import {delay} from "rxjs";

@Injectable({
    providedIn: 'root'
})
export class DataService {
    url = 'http://127.0.0.1:4201/data';

    constructor(private http: HttpClient) {
    }

    getAllData(page: number, perPage: number) {
        return this.http.get<Data[]>(this.url, {
            observe: 'response',
            params: {
                'page': page,
                'per-page': perPage
            }
        }).pipe(delay(500));
    }
}
