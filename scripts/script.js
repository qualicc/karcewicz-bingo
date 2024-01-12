var pierwszyObiekt = $('#pasek-right');
    
// Pobranie drugiego obiektu
var drugiObiekt = $('#pasek-left');

// Dodanie 30 gwiazdek do pierwszego obiektu
for (var i = 0; i < 30; i++) {
    pierwszyObiekt.append('<div class="gwiazdka">&#9733;</div>');
}

// Dodanie 30 gwiazdek do drugiego obiektu
for (var i = 0; i < 30; i++) {
    drugiObiekt.append('<div class="gwiazdka">&#9733;</div>');
}