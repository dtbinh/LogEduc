/**
 * Created by luk on 19/05/15.
 */
/* Les données sur les notes */
var textBlanche = '{' +
    '"index": {"Do1": 0, "Re1": 1, "Mi1": 2, "Fa1": 3, "Sol1": 4, "La1": 5,"Si1": 6, "Do2": 7, "Re2": 8,"Mi2": 9, "Fa2": 10, "Sol2": 11, "La2": 12, "Si2": 13},' +
    '"data": [{"id": "Do1","tId": "1C","nom":"Do grave"},' +
    '{"id": "Re1","tId": "1D","nom":"Ré grave"},' +
    '{"id": "Mi1","tId": "1E","nom":"Mi grave"},' +
    '{"id":"Fa1","tId":"1F","nom":"Fa grave"},' +
    '{"id":"Sol1","tId":"1G","nom":"Sol grave"},' +
    '{"id":"La1","tId":"2A","nom":"La grave"},' +
    '{"id":"Si1","tId":"2B","nom":"Si grave"},' +
    '{"id":"Do2","tId":"2C","nom":"Do aigu"},' +
    '{"id":"Re2","tId":"2D","nom":"Ré aigu"},' +
    '{"id":"Mi2","tId":"2E","nom":"Mi aigu"},' +
    '{"id":"Fa2","tId":"2F","nom":"Fa aigu"},' +
    '{"id":"Sol2","tId":"2G","nom":"Sol aigu"},' +
    '{"id":"La2","tId":"3A","nom":"La aigu"},' +
    '{"id":"Si2","tId":"3B","nom":"Si aigu"}' +
    ']}';
var jsonTableauNoteBlanche = JSON.parse(textBlanche);

var textNoire = '{' +
    '"index": {"Do1D": 0, "Re1B": 1, "Re1D": 2, "Mi1B": 3, "Fa1D": 4, "Sol1B": 5,"Sol1D": 6, "La1B": 7, "La1D": 8,"Si1B": 9,' +
    '"Do2D": 10, "Re2B": 11, "Re2D": 12, "Mi2B": 13, "Fa2D": 14, "Sol2B": 15, "Sol2D": 16, "La2B": 17, "La2D": 18, "Si2B": 19},' +
    '"data": [{"id": "Do1D","tId": "1Cs","nom":"Do Grave dièse"},' +
    '{"id": "Re1B","tId": "1Cs","nom":"Ré Grave bémol"},' +
    '{"id": "Re1D","tId": "1Ds","nom":"Ré Grave dièse"},' +
    '{"id": "Mi1B","tId": "1Ds","nom":"Mi Grave bémol"},' +
    '{"id": "Fa1D","tId": "1Fs","nom":"Fa Grave dièse"},' +
    '{"id": "Sol1B","tId": "1Fs","nom":"Sol Grave bémol"},' +
    '{"id": "Sol1D","tId": "1Gs","nom":"Sol Grave dièse"},' +
    '{"id": "La1B","tId": "1Gs","nom":"La Grave bémol"},' +
    '{"id": "La1D","tId": "2As","nom":"La Grave dièse"},' +
    '{"id": "Si1B","tId": "2As","nom":"Si Grave bémol"},' +
    '{"id": "Do2D","tId": "2Cs","nom":"Do Aigu dièse"},' +
    '{"id": "Re2B","tId": "2Cs","nom":"Ré Aigu bémol"},' +
    '{"id": "Re2D","tId": "2Ds","nom":"Ré Aigu dièse"},' +
    '{"id": "Mi2B","tId": "2Ds","nom":"Mi Aigu bémol"},' +
    '{"id": "Fa2D","tId": "2Fs","nom":"Fa Aigu dièse"},' +
    '{"id": "Sol2B","tId": "2Fs","nom":"Sol Aigu bémol"},' +
    '{"id": "Sol2D","tId": "2Gs","nom":"Sol Aigu dièse"},' +
    '{"id": "La2B","tId": "2Gs","nom":"La Aigu bémol"},' +
    '{"id": "La2D","tId": "3As","nom":"La Aigu dièse"},' +
    '{"id": "Si2B","tId": "3Bs","nom":"Si Aigu bémol"}' +
    ']}';
var jsonTableauNoteNoire = JSON.parse(textNoire);

/* Fin des données sur les notes */