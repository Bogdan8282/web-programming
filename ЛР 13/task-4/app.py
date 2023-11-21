from flask import Flask, render_template
import requests
from bs4 import BeautifulSoup as BS

app = Flask(__name__)

@app.route('/')
def index():
    url = "https://weather.com/uk-UA/weather/today/l/8d61fe0298405a2caf36ceadc442079a41a66bc97c8b3fd49f0641ac93ad8878"
    r = requests.get(url)
    soup = BS(r.text, 'lxml')

    general = soup.find('div', class_='CurrentConditions--primary--2DOqs')
    selected_elements = general.find_all()[0], general.find_all()[2], general.find_all()[3]
    text_content = [elem.text.strip() for elem in selected_elements]

    loc = soup.find('div', class_='CurrentConditions--header--kbXKR').find_all()[0].text

    return render_template('index.html', location=loc, weather_result=text_content)

if __name__ == '__main__':
    app.run(debug=True)
