import { PropertyImage } from './property-image.model';
import { PropertyFile } from './property-file.model';
import { PropertyPartner } from './property-partner.model';
import { Expense } from './expense.model';

export interface Property {
  id: number;
  name: string;
  realestate: string;
  statusproperties: string;
  cep: string;
  logradouro: string;
  bairro: string;
  cidade:string;
  uf: string;
  areatotal: string;
  areaconstruida: string;
  valorvenal: string;
  valordaaquisicao: string;
  dataaquisicao: Date;
  valordevenda: string;
  dataavaliacao: Date;
  construction: string;
  company: string;
  feedback: string;
  latitude: string;
  longitude: string;
  images: PropertyImage[];
  files: PropertyFile[];
  partners: PropertyPartner[];
  expenses: Expense[];
}
