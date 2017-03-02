import RPi.GPIO as GPIO
import urllib2 as request
import time

GPIO.setmode(GPIO.BCM)

GPIO.setup(18, GPIO.IN, pull_up_down=GPIO.PUD_UP)

print("Up and running!")

while True:
	input_state = GPIO.input(18)
	if input_state == False:
		print("Button was pressed!")
		try:
			request.urlopen('http://localhost/app.php/api/buzz')
		except:
			print("There was an error")