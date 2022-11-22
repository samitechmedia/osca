import sys, getopt
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import json
import re

url = 'http://widgetstore.bosscasinos.com/data.aspx?aWQ9NjQ1&invoke=getData(%5B%22en-US%22,180%5D)'

browser = webdriver.Chrome()

browser.get(url)

WebDriverWait(browser, 10).until(
    EC.presence_of_element_located((By.TAG_NAME, "pre"))
)

pageSource = browser.page_source
matches = re.search('\{(?:[^*])*\}', pageSource)
json = matches.group().encode('utf-8')

print (json)

browser.quit()
