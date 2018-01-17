#include <SPI.h>
#include <Ethernet.h>
#include "DHT.h"
#define DHTPIN A1
#define DHTTYPE DHT11
byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };

byte ip[] = { 192, 168, 0, 11 };

byte servidor[] = { 192, 168, 0, 10 };

DHT dht(DHTPIN, DHTTYPE);
float temperatura = 0;
float umidade = 0;

EthernetClient cliente;
unsigned long previousMillis = 0;
const long interval = 20000;
void setup() {

  Serial.begin(9600);
  Ethernet.begin(mac, ip);
}

void loop() {
  float temperatura = dht.readTemperature();
  float umidade = dht.readHumidity();
  if (isnan(temperatura) || isnan(umidade))
  {
    Serial.println("Falha na leitura do sensor DHT11");
  }
  else
  {
    unsigned long currentMillis = millis();

    if (currentMillis - previousMillis >= interval) {
      previousMillis = currentMillis;

      if (cliente.connect(servidor, 8095)) {
        Serial.println("Conectado");


        cliente.print("GET /arduino/salvardados.php?");
        cliente.print("temperatura=");
        cliente.print(temperatura);
        cliente.print("&umidade=");
        cliente.println(umidade);

        Serial.print("Temperatura = ");
        Serial.println(temperatura);
        Serial.print("Umidade = ");
        Serial.println(umidade);

        cliente.stop();
      } else {
        Serial.println("Falha na conexão");

        cliente.stop();
      }
    }
  }
}

