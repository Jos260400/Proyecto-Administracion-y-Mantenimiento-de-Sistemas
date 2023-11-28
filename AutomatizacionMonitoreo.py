from selenium import webdriver
from selenium.webdriver.common.keys import Keys

#iniciamos el navegador con el url de la pagina
driver = webdriver.Chrome()
url = ""
driver.get(url)

try:
    titulo_pagina = driver.title
    print(f"Título de la página: {titulo_pagina}")

    input_carne = driver.find_element_by_id("carne")
    valor_carne = input_carne.get_attribute("value")
    print(f"Carne del estudiante: {valor_carne}")

#Cerramos el navegador 
finally:
    driver.quit()