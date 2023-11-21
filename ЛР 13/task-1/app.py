from flask import Flask, render_template
import requests
from bs4 import BeautifulSoup as BS

app = Flask(__name__)

@app.route('/')
def index():
    url = 'https://college.ks.ua/'
    r = requests.get(url)
    soup = BS(r.text, 'html.parser')

    news_item = soup.find('div', class_='news_item')

    paragraphs = [p.text for p in news_item.find('div', class_='news_item__content').find_all('p')]

    return render_template('index.html', content=paragraphs)

if __name__ == '__main__':
    app.run(debug=True)