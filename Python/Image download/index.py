import requests
import threading

image_list=[]

def download_img(url,var):

    response = requests.get(url)

    filename = "{}.jpg".format(var)

    file = open(filename, "wb")

    file.write(response.content)

    file.close()

var = 0

for i in image_list:
    t = threading.Thread(target=download_img,args=(i,var,))
    t.start()
    var += 1