import requests
from bs4 import BeautifulSoup
import sys
import json

def fetch_novel_content(url):
    headers = {
        'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
    }

    try:
        response = requests.get(url, headers=headers)
        response.raise_for_status()
        
        if response.status_code == 200:
            html_content = response.text
            soup = BeautifulSoup(html_content, 'html.parser')
            title = soup.find('title').text.strip() if soup.find('title') else 'No title found'
            image = soup.find('meta', {'property': 'og:image'})
            image_url = image['content'] if image else 'No image found'
            content_div = soup.find('div', {'class': 'paragraph-list'})
            content = content_div.get_text(strip=True) if content_div else 'Content not found'
            
            result = {
                'title': title,
                'image_url': image_url,
                'content': content
            }
            print(json.dumps(result))
        else:
            print(json.dumps({'error': f'Failed to fetch page. Status code: {response.status_code}'}))
    
    except requests.exceptions.RequestException as e:
        print(json.dumps({'error': f'Failed to fetch page. Error: {str(e)}'}))

if __name__ == "__main__":
    url = sys.argv[1]  # Get URL from command-line arguments
    fetch_novel_content(url)