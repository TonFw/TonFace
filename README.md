FaceAPI
=======

Criação de uma API para maior abstração da API do Facebook.
<br><br>

### Modelagem de BD
------------------

#### Perfil básico
 ![image](https://github.com/TonGarcia/FaceAPI/blob/sprint1/FaceApp/modelagem/perfil-basico-RedeSocial.png?raw=true) 
 
 <br>
 Para cada novo atributo a ser associado no Facebook é apenas ID e Nome para puxar do hash, como em: 
 * Time favorito
  * [favorite_teams] => Array ( [0] => Array ( [id] => 191025650976045 [name] => Real Guará ) [1] => Array ( [id] => 19034719952 [name] => Real Madrid C.F. )
 * Educação 
  * [education] => Array ( [0] => Array ( [school] => Array ( [id] => 103125803065667 [name] => Colégio Rogacionista ) [year] => Array ( [id] => 136328419721520 [name] => 2009 ) [type] => High School ) [1] => Array ( [school] => Array ( [id] => 113901608620360 [name] => Universidade de Brasília ) [type] => College ) )
 * Cidade corrente
  * [location] => Array ( [id] => 112060958820146 [name] => Brasília, Brazil )
  

<br><br>
__TODOS__ os __relacionamentos__ com o __Perfil básico__ são __N x N__

<br>
### API
------------------

#### Uso deste projeto como uma API


<br>
### Framework
------------------

#### Uso deste projeto como um Framework





