# crud-carro

## Projeto minimalista para exemplo de um CRUD em PHP.

#### Características:

#### - Arquitetura MVC
#### - MySQLi para conexão com o banco de dados
#### - Autenticação com sessão
#### - Upload de imagens
#### - Geração de PDF's com a biblioteca TCPDF (aumentando o tamanho do projeto para mais de 10 mb)

## === Sobre a camada Model (MVC) neste projeto ===

#### A pasta (pacote) model está sendo utilizada como uma camada para manipulação dos dados (que é a maneira correta),
#### e não apenas como uma pasta onde estão localizadas as classes que servem como entidades.
#### A camada model neste projeto contém os pacotes entity (classes/entidades que servem como espelho as tabelas no bd),
#### dao (classes para acesso e manipulação dos dados nas tabelas do bd) e dto (objetos para transferência de dados,
#### para os casos em que seja necessário adicionar atributos transientes após as consultas ao bd).

#### Referência: https://stackoverflow.com/questions/5863870/how-should-a-model-be-structured-in-mvc

## === Sobre as fontes da biblioteca TCPDF neste projeto ===

#### Apenas as fontes essenciais. 
#### Outras fontes foram removidas deste projeto exemplo para diminuir o tamanho do mesmo,
#### pois com todas as fontes o tamanho do projeto chegava a 14 mb.

#### As fontes presentes são:

#### courier : Courier
#### courierB : Courier Bold
#### courierBI : Courier Bold Italic
#### courierI : Courier Italic
#### helvetica : Helvetica
#### helveticaB : Helvetica Bold
#### helveticaBI : Helvetica Bold Italic
#### helveticaI : Helvetica Italic
#### symbol : Symbol
#### times : Times New Roman
#### timesB : Times New Roman Bold
#### timesBI : Times New Roman Bold Italic
#### timesI : Times New Roman Italic
#### zapfdingbats : Zapf Dingbats

#### Referência: https://tcpdf.org/docs/fonts/